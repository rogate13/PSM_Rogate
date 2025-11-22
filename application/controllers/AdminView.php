<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminView extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model', 'members');
    }

    // Halaman daftar member
    public function members()
    {
        $data['members'] = $this->members->getAll();

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/members/index', $data);
        $this->load->view('admin/layouts/footer');
    }

    // Detail member
    public function member_detail($id)
    {
        $data['member'] = $this->members->find($id);
        if (!$data['member']) show_404();

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/members/detail', $data);
        $this->load->view('admin/layouts/footer');
    }
}
