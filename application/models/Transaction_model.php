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
        return $this->db
            ->select('transactions.*, transaction_types.name AS type_name, transaction_types.code AS type_code')
            ->from('transactions')
            ->join('transaction_types', 'transaction_types.id = transactions.transaction_type_id', 'left')
            ->where('transactions.member_id', $member_id)
            ->order_by('transactions.created_at', 'DESC')
            ->get()
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

    public function getByMemberWithType($member_id)
    {
        return $this->db
            ->select('t.*, tt.name')
            ->from('transactions t')
            ->join('transaction_types tt', 'tt.id = t.transaction_type_id', 'left')
            ->where('t.member_id', $member_id)
            ->order_by('t.created_at', 'DESC')
            ->get()
            ->result_array();
    }
}
