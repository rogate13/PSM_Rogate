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
}
