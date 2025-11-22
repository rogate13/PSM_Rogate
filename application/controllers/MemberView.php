<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberView extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('RoleLib', null, 'role');
        $this->load->model('Member_model', 'members');
        $this->load->model('Transaction_model', 'transactions');
    }

    // Halaman profil member yang sedang login
    public function profile()
    {
        $this->role->require(['MEMBER']);

        $member_id = $this->role->user()['member_id'];
        $data['member'] = $this->members->find($member_id);

        $this->load->view('member/layouts/header');
        $this->load->view('member/profile', $data);
        $this->load->view('member/layouts/footer');
    }

    // Halaman transaksi milik member
    public function transactions()
    {
        $this->role->require(['MEMBER']);

        $member_id = $this->role->user()['member_id'];
        $data['list'] = $this->transactions->getByMember($member_id);

        $this->load->view('member/layouts/header');
        $this->load->view('member/transactions', $data);
        $this->load->view('member/layouts/footer');
    }
}
