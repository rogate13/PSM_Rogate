<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    public function index()
    {
        // Halaman daftar member (opsional)
        $this->load->view('member/index');
    }

    public function detail($id)
    {
        $this->load->model('Member_model', 'members');
        $member = $this->members->find($id);

        $this->load->view('member/detail', compact('member'));
    }
}
