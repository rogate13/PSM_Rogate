<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * BalanceService
 *
 * @property CI_Loader $load
 * @property Member_model $members
 * @property Transaction_model $transactions
 * @property Transaction_type_model $trx_types
 * @property Transaction_log_model $transactionLog
 */
class BalanceService
{

    /**
     * @var CI_Controller|CI_Model|object
     * @property Member_model $members
     * @property Transaction_model $transactions
     * @property Transaction_type_model $trx_types
     * @property Transaction_log_model $transactionLog
     */
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('Member_model',         'members');
        $this->CI->load->model('Transaction_model',    'transactions');
        $this->CI->load->model('Transaction_type_model', 'trx_types');
        $this->CI->load->model('Transaction_log_model', 'transactionLog');
    }

    /* --------------------------
        TOPUP SALDO
    --------------------------- */
    public function topup($member_id, $amount)
    {
        $member = $this->CI->members->find($member_id);
        if (!$member) throw new Exception("Member not found");

        $before = (int)$member['current_balance'];
        $after  = $before + $amount;

        // Update saldo
        $this->CI->members->updateBalance($member_id, $after);

        // Insert transaksi
        $type = $this->CI->trx_types->findByCode('TOPUP');
        $trx_id = $this->CI->transactions->create([
            'member_id'           => $member_id,
            'transaction_type_id' => $type['id'],
            'amount'              => $amount,
            'balance_before'      => $before,
            'balance_after'       => $after,
            'channel'             => 'API',
        ]);

        // Log transaksi tambahan
        $this->CI->transactionLog->createLog([
            'transaction_id' => $trx_id,
            'member_id'      => $member_id,
            'before_balance' => $before,
            'after_balance'  => $after
        ]);

        return $after;
    }

    /* --------------------------
        DEDUCT SALDO
    --------------------------- */
    public function deduct($member_id, $amount)
    {
        $member = $this->CI->members->find($member_id);
        if (!$member) throw new Exception("Member not found");

        $before = (int)$member['current_balance'];
        if ($before < $amount) throw new Exception("Insufficient balance");

        $after = $before - $amount;

        // Update saldo
        $this->CI->members->updateBalance($member_id, $after);

        // Insert transaksi
        $type = $this->CI->trx_types->findByCode('PURCHASE');
        $trx_id = $this->CI->transactions->create([
            'member_id'           => $member_id,
            'transaction_type_id' => $type['id'],
            'amount'              => $amount,
            'balance_before'      => $before,
            'balance_after'       => $after,
            'channel'             => 'API',
        ]);

        // Log transaksi tambahan
        $this->CI->transactionLog->createLog([
            'transaction_id' => $trx_id,
            'member_id'      => $member_id,
            'before_balance' => $before,
            'after_balance'  => $after
        ]);

        return $after;
    }
}
