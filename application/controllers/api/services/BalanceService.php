<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BalanceService
{

    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('Member_model', 'members');
        $this->CI->load->model('Transaction_model', 'transactions');
        $this->CI->load->model('Transaction_type_model', 'trx_types');
        $this->CI->load->driver('cache', ['adapter' => 'redis', 'backup' => 'file']);
    }

    public function topup($memberId, $amount, $desc = null, $ref = null)
    {
        $member = $this->CI->members->find($memberId);
        if (!$member) throw new Exception("Member not found");

        $before = (int)$member['current_balance'];
        $after  = $before + $amount;

        // update saldo
        $this->CI->members->updateBalance($memberId, $after);

        // simpan transaksi
        $type = $this->CI->trx_types->findByCode('TOPUP');

        $this->CI->transactions->create([
            'member_id'          => $memberId,
            'transaction_type_id' => $type['id'],
            'reference_no'       => $ref,
            'amount'             => $amount,
            'balance_before'     => $before,
            'balance_after'      => $after,
            'description'        => $desc,
            'channel'            => 'API'
        ]);

        // update redis
        $this->CI->cache->save("member_balance_$memberId", $after, 3600);

        return $after;
    }

    public function deduct($memberId, $amount, $desc = null, $ref = null)
    {
        $member = $this->CI->members->find($memberId);
        if (!$member) throw new Exception("Member not found");

        $before = (int)$member['current_balance'];

        if ($before < $amount)
            throw new Exception("Insufficient balance");

        $after = $before - $amount;

        // update saldo
        $this->CI->members->updateBalance($memberId, $after);

        // simpan transaksi
        $type = $this->CI->trx_types->findByCode('PURCHASE');

        $this->CI->transactions->create([
            'member_id'          => $memberId,
            'transaction_type_id' => $type['id'],
            'reference_no'       => $ref,
            'amount'             => $amount,
            'balance_before'     => $before,
            'balance_after'      => $after,
            'description'        => $desc,
            'channel'            => 'API'
        ]);

        $this->CI->cache->save("member_balance_$memberId", $after, 3600);

        return $after;
    }
}
