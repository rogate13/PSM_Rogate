<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_log_model extends CI_Model
{

    private $table = 'login_log';

    public function log($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getAll($limit = 200, $offset = 0)
    {
        return $this->db->order_by('created_at', 'DESC')
            ->limit($limit, $offset)
            ->get($this->table)
            ->result_array();
    }

    public function find($id)
    {
        return $this->db->where('id', $id)
            ->get($this->table)
            ->row_array();
    }

    public function getByUser($user_id, $limit = 200)
    {
        return $this->db->where('user_id', $user_id)
            ->order_by('created_at', 'DESC')
            ->limit($limit)
            ->get($this->table)
            ->result_array();
    }

    public function createLog($data)
    {
        return $this->db->insert('login_log', $data);
    }
}
