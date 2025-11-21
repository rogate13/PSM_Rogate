<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $table = 'users';
    private $primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $data['password_hash'] = password_hash($data['password'], PASSWORD_BCRYPT);
        unset($data['password']);

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

    public function findByUsername($username)
    {
        return $this->db
            ->where('username', $username)
            ->get($this->table)
            ->row_array();
    }
}
