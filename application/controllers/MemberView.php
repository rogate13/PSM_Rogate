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

    public function topup()
    {
        $this->role->require(['MEMBER']);

        $this->load->view('member/layouts/header');
        $this->load->view('member/topup_form');
        $this->load->view('member/layouts/footer');
    }

    public function topup_submit()
    {
        $this->role->require(['MEMBER']);

        $member_id = $this->role->user()['member_id'];
        $amount = $this->input->post('amount');

        if ($amount <= 0) {
            $data['error'] = "Nominal tidak valid.";
            $this->load->view('member/layouts/header');
            $this->load->view('member/topup_form', $data);
            $this->load->view('member/layouts/footer');
            return;
        }

        $this->load->library('BalanceService');

        try {
            $this->balanceservice->topup($member_id, $amount);
            redirect('member/profile');
        } catch (Exception $e) {
            $data['error'] = $e->getMessage();
            $this->load->view('member/layouts/header');
            $this->load->view('member/topup_form', $data);
            $this->load->view('member/layouts/footer');
        }
    }


    public function donate()
    {
        $this->role->require(['MEMBER']);

        $this->load->view('member/layouts/header');
        $this->load->view('member/donate_form');
        $this->load->view('member/layouts/footer');
    }

    public function donate_submit()
    {
        $this->role->require(['MEMBER']);

        $member_id = $this->role->user()['member_id'];
        $amount = $this->input->post('amount');

        if ($amount <= 0) {
            $data['error'] = "Nominal tidak valid.";
            $this->load->view('member/layouts/header');
            $this->load->view('member/donate_form', $data);
            $this->load->view('member/layouts/footer');
            return;
        }

        $this->load->library('BalanceService');

        try {
            $this->balanceservice->deduct($member_id, $amount);
            redirect('member/profile');
        } catch (Exception $e) {
            $data['error'] = $e->getMessage();
            $this->load->view('member/layouts/header');
            $this->load->view('member/donate_form', $data);
            $this->load->view('member/layouts/footer');
        }
    }

}
