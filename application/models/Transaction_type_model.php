<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_type_model extends CI_Model
{

    private $table = 'transaction_types';

    public function findByCode($code)
    {
        return $this->db->where('code', $code)->get($this->table)->row_array();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }
}
