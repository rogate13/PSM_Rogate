<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{

    private $table = 'members';

    public function getAll()
    {
        return $this->db->order_by('id', 'DESC')->get($this->table)->result_array();
    }

    public function find($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row_array();
    }

    public function findByCode($code)
    {
        return $this->db->where('member_code', $code)->get($this->table)->row_array();
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); // BIGINT supported
    }

    public function updateData($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function deleteData($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }

    public function updateBalance($member_id, $amount)
    {
        return $this->db->set('current_balance', $amount)
            ->where('id', $member_id)
            ->update($this->table);
    }
}
