<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_type_model extends CI_Model
{
    private $table = 'transaction_types';
    private $primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function find($id)
    {
        return $this->db
            ->where($this->primaryKey, $id)
            ->get($this->table)
            ->row_array();
    }

    public function findByCode($code)
    {
        return $this->db
            ->where('code', strtoupper($code))
            ->get($this->table)
            ->row_array();
    }

    public function all()
    {
        return $this->db
            ->order_by('id', 'ASC')
            ->get($this->table)
            ->result_array();
    }
}
