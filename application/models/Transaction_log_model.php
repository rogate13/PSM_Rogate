<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_log_model extends CI_Model
{

    private $table = 'transaction_log';

    public function createLog($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getByMember($member_id, $limit = 100, $offset = 0)
    {
        return $this->db->where('member_id', $member_id)
            ->order_by('created_at', 'DESC')
            ->limit($limit, $offset)
            ->get($this->table)
            ->result_array();
    }

    public function getByTransaction($transaction_id)
    {
        return $this->db->where('transaction_id', $transaction_id)
            ->get($this->table)
            ->result_array();
    }

    public function getAll($limit = 200, $offset = 0)
    {
        return $this->db->order_by('created_at', 'DESC')
            ->limit($limit, $offset)
            ->get($this->table)
            ->result_array();
    }
}
