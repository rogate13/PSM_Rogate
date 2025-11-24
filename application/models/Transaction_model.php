<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{

    private $table = 'transactions';

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); // BIGINT UNSIGNED
    }

    public function getByMember($member_id)
    {
        return $this->db->where('member_id', $member_id)
            ->order_by('created_at', 'DESC')
            ->get($this->table)
            ->result_array();
    }

    public function getAll()
    {
        return $this->db
            ->select('
            transactions.*,
            members.full_name AS member_name,
            transaction_types.name AS type_name,
            users.username AS created_by_name
        ')
            ->from('transactions')
            ->join('members', 'members.id = transactions.member_id', 'left')
            ->join('transaction_types', 'transaction_types.id = transactions.transaction_type_id', 'left')
            ->join('users', 'users.id = transactions.created_by', 'left')
            ->order_by('transactions.id', 'DESC')
            ->get()
            ->result_array();
    }
}
