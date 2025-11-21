<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_log_model extends CI_Model
{

    private $table = 'member_log';

    // Insert log
    public function createLog($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Ambil semua log (descending)
    public function getAll($limit = 100, $offset = 0)
    {
        return $this->db->order_by('created_at', 'DESC')
            ->limit($limit, $offset)
            ->get($this->table)
            ->result_array();
    }

    // Ambil log berdasarkan member
    public function getByMember($member_id, $limit = 100, $offset = 0)
    {
        return $this->db->where('member_id', $member_id)
            ->order_by('created_at', 'DESC')
            ->limit($limit, $offset)
            ->get($this->table)
            ->result_array();
    }

    // Ambil satu log
    public function find($id)
    {
        return $this->db->where('id', $id)
            ->get($this->table)
            ->row_array();
    }

    // Filter by date (YYYY-MM-DD)
    public function getByDateRange($start_date, $end_date)
    {
        return $this->db->where('DATE(created_at) >=', $start_date)
            ->where('DATE(created_at) <=', $end_date)
            ->order_by('created_at', 'DESC')
            ->get($this->table)
            ->result_array();
    }
}
