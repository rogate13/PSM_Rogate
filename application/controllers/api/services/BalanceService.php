<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * BalanceService
 *
 * Business logic untuk topup, deduct, transaksi, dan integrasi MongoDB.
 *
 * @property Member_model          $members
 * @property Transaction_model     $transactions
 * @property Transaction_type_model $trx_types
 * @property Transaction_log_model $transactionLog
 */
class BalanceService
{
    /**
     * @var object CI Instance
     */
    private $CI;

    /**
     * MongoDB Services
     */
    private $eventLogger;
    private $apiLogger;
    private $snapshot;
    private $eventSource;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->CI = &get_instance();

        // Load model
        $this->CI->load->model('Member_model', 'members');
        $this->CI->load->model('Transaction_model', 'transactions');
        $this->CI->load->model('Transaction_type_model', 'trx_types');
        $this->CI->load->model('Transaction_log_model', 'transactionLog');

        // Load MongoDB OOP services
        $this->CI->load->library('Nosql/MongoEventLogger');
        $this->CI->load->library('Nosql/MongoApiLogger');
        $this->CI->load->library('Nosql/MongoSnapshotService');
        $this->CI->load->library('Nosql/MongoEventSourcing');

        // Assign
        $this->eventLogger = new MongoEventLogger();
        $this->apiLogger   = new MongoApiLogger();
        $this->snapshot    = new MongoSnapshotService();
        $this->eventSource = new MongoEventSourcing();
    }

    /**
     * TOPUP Saldo Member
     *
     * @param int $member_id
     * @param int $amount
     * @return int saldo akhir
     * @throws Exception
     */
    public function topup($member_id, $amount)
    {
        $member = $this->CI->members->find($member_id);
        if (!$member) throw new Exception("Member not found");

        $before = (int)$member['current_balance'];
        $after  = $before + $amount;

        // Update saldo member
        $this->CI->members->updateBalance($member_id, $after);

        // Ambil jenis transaksi TOPUP
        $type = $this->CI->trx_types->findByCode('TOPUP');

        // Simpan transaksi MySQL
        $trx_id = $this->CI->transactions->create([
            'member_id'           => $member_id,
            'transaction_type_id' => $type['id'],
            'amount'              => $amount,
            'balance_before'      => $before,
            'balance_after'       => $after,
            'channel'             => 'API'
        ]);

        // Simpan log MySQL
        $this->CI->transactionLog->createLog([
            'transaction_id' => $trx_id,
            'member_id'      => $member_id,
            'before_balance' => $before,
            'after_balance'  => $after
        ]);

        // --- MongoDB Integrations ---

        // 1. Event Log
        $this->eventLogger->log("TOPUP", [
            "member_id" => $member_id,
            "amount"    => $amount,
            "before"    => $before,
            "after"     => $after,
            "trx_id"    => $trx_id
        ]);

        // 2. Daily Snapshot
        $this->snapshot->snapshot($member_id, $before, $after);

        // 3. Event Sourcing
        $this->eventSource->record("TOPUP_EVENT", [
            "member_id" => $member_id,
            "amount"    => $amount,
            "before"    => $before,
            "after"     => $after
        ]);

        return $after;
    }

    /**
     * DEDUCT Saldo Member
     *
     * @param int $member_id
     * @param int $amount
     * @return int saldo akhir
     * @throws Exception
     */
    public function deduct($member_id, $amount)
    {
        $member = $this->CI->members->find($member_id);
        if (!$member) throw new Exception("Member not found");

        $before = (int)$member['current_balance'];
        if ($before < $amount) throw new Exception("Insufficient balance");

        $after = $before - $amount;

        // Update saldo MySQL
        $this->CI->members->updateBalance($member_id, $after);

        // Ambil jenis transaksi PURCHASE
        $type = $this->CI->trx_types->findByCode('PURCHASE');

        // Simpan transaksi MySQL
        $trx_id = $this->CI->transactions->create([
            'member_id'           => $member_id,
            'transaction_type_id' => $type['id'],
            'amount'              => $amount,
            'balance_before'      => $before,
            'balance_after'       => $after,
            'channel'             => 'API'
        ]);

        // Simpan log MySQL
        $this->CI->transactionLog->createLog([
            'transaction_id' => $trx_id,
            'member_id'      => $member_id,
            'before_balance' => $before,
            'after_balance'  => $after
        ]);

        // --- MongoDB Integrations ---

        // 1. Event Log
        $this->eventLogger->log("DEDUCT", [
            "member_id" => $member_id,
            "amount"    => $amount,
            "before"    => $before,
            "after"     => $after,
            "trx_id"    => $trx_id
        ]);

        // 2. Snapshot
        $this->snapshot->snapshot($member_id, $before, $after);

        // 3. Event Sourcing
        $this->eventSource->record("DEDUCT_EVENT", [
            "member_id" => $member_id,
            "amount"    => $amount,
            "before"    => $before,
            "after"     => $after
        ]);

        return $after;
    }
}
