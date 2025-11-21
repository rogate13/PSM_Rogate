<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    private $table = 'transactions';
    private $primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
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

    public function getByMember($memberId, $typeId = null, $limit = 50)
    {
        $this->db->where('member_id', $memberId);

        if (!empty($typeId)) {
            $this->db->where('transaction_type_id', $typeId);
        }

        return $this->db
            ->order_by('created_at', 'DESC')
            ->limit($limit)
            ->get($this->table)
            ->result_array();
    }
}
