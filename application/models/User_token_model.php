<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_token_model extends CI_Model
{
    private $table = 'user_tokens';

    public function __construct()
    {
        parent::__construct();
    }

    /** Simpan token baru */
    public function storeToken($user_id, $token, $expired_at)
    {
        // Hapus token lama user ini (opsional)
        $this->db->delete($this->table, ['user_id' => $user_id]);

        return $this->db->insert($this->table, [
            'user_id'    => $user_id,
            'token'      => $token,
            'expired_at' => $expired_at,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    /** Ambil data token */
    public function findByToken($token)
    {
        return $this->db->get_where($this->table, [
            'token' => $token
        ])->row_array();
    }

    /** Hapus 1 token */
    public function deleteToken($token)
    {
        return $this->db->delete($this->table, ['token' => $token]);
    }

    /** Bersihkan token expired */
    public function deleteExpired()
    {
        $this->db->where('expired_at <', date('Y-m-d H:i:s'));
        $this->db->delete($this->table);
    }
}
