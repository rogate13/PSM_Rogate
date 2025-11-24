<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    private $table = 'users';
    private $token = 'user_tokens';

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

    public function updateToken($id, $token)
    {
        return $this->db->where('id', $id)->update($this->table, [
            'api_token' => $token,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function save_token($user_id, $token)
    {
        $expired_at = date('Y-m-d H:i:s', time() + 3600); // 1 jam

        return $this->db->insert($this->token, [
            'user_id'    => $user_id,
            'token'      => $token,
            'expired_at' => $expired_at
        ]);
    }
}
