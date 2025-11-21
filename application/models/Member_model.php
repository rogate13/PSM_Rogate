<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
    private $table = 'members';
    private $primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = $data['created_at'];

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function find($id)
    {
        return $this->db
            ->where($this->primaryKey, $id)
            ->get($this->table)
            ->row_array();
    }

    public function findByCode($memberCode)
    {
        return $this->db
            ->where('member_code', $memberCode)
            ->get($this->table)
            ->row_array();
    }

    public function updateBalance($memberId, $newBalance)
    {
        return $this->db
            ->where($this->primaryKey, $memberId)
            ->update($this->table, [
                'current_balance' => $newBalance,
                'updated_at'      => date('Y-m-d H:i:s'),
            ]);
    }

    public function updateStatus($memberId, $status)
    {
        return $this->db
            ->where($this->primaryKey, $memberId)
            ->update($this->table, [
                'status'     => $status,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }
}
