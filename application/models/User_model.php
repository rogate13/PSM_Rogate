<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    private $table = 'users';

    public function findByUsername($username)
    {
        return $this->db->where('username', $username)->get($this->table)->row_array();
    }

    public function find($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row_array();
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}
