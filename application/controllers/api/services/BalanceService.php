<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * BalanceService
 */
class BalanceService
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('Member_model', 'members');
        $this->CI->load->model('Transaction_model', 'transactions');
        $this->CI->load->model('Transaction_type_model', 'trx_types');
        $this->CI->load->model('Transaction_log_model', 'transactionLog');
    }

    /* --------------------------
        TOPUP SALDO
    --------------------------- */
    public function topup($member_id, $amount, $description = 'Topup saldo')
    {
        $member = $this->CI->members->find($member_id);
        if (!$member) throw new Exception("Member not found");

        $before = (int) $member['current_balance'];
        $after  = $before + $amount;

        // Update saldo
        $this->CI->members->updateBalance($member_id, $after);

        // Jenis transaksi
        $type = $this->CI->trx_types->findByCode('TOPUP');

        // Insert transaksi
        $trx_id = $this->CI->transactions->create([
            'member_id'           => $member_id,
            'transaction_type_id' => $type['id'],
            'description'         => $description,
            'amount'              => $amount,
            'balance_before'      => $before,
            'balance_after'       => $after,
            'channel'             => 'API',
        ]);

        // Insert log
        $this->CI->transactionLog->createLog([
            'transaction_id' => $trx_id,
            'member_id'      => $member_id,
            'before_balance' => $before,
            'after_balance'  => $after
        ]);

        return [
            'message' => 'Topup success',
            'amount'  => $amount,
            'balance_before' => $before,
            'balance_after'  => $after
        ];
    }

    /* --------------------------
        DEDUCT SALDO
    --------------------------- */
    public function deduct($member_id, $amount, $description = 'Pengurangan saldo')
    {
        $member = $this->CI->members->find($member_id);
        if (!$member) throw new Exception("Member not found");

        $before = (int) $member['current_balance'];
        if ($before < $amount) {
            throw new Exception("Insufficient balance");
        }

        $after = $before - $amount;

        // Update saldo
        $this->CI->members->updateBalance($member_id, $after);

        // Jenis transaksi
        $type = $this->CI->trx_types->findByCode('PURCHASE');

        // Insert transaksi
        $trx_id = $this->CI->transactions->create([
            'member_id'           => $member_id,
            'transaction_type_id' => $type['id'],
            'description'         => $description,
            'amount'              => $amount,
            'balance_before'      => $before,
            'balance_after'       => $after,
            'channel'             => 'API',
        ]);

        // Insert log
        $this->CI->transactionLog->createLog([
            'transaction_id' => $trx_id,
            'member_id'      => $member_id,
            'before_balance' => $before,
            'after_balance'  => $after
        ]);

        return [
            'message' => 'Deduct success',
            'amount'  => $amount,
            'balance_before' => $before,
            'balance_after'  => $after
        ];
    }
}
