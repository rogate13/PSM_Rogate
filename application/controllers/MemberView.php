<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * MemberView
 *
 * Controller khusus halaman WEB untuk member (profil, topup, donasi, transaksi).
 * Tidak pakai RoleLib / BalanceService supaya tidak bentrok dengan output JSON.
 */
class MemberView extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Library & model yang dibutuhkan
        $this->load->library('session');
        $this->load->model('Member_model', 'members');
        $this->load->model('Transaction_model', 'transactions');
        $this->load->model('Transaction_type_model', 'trx_types');
        $this->load->model('Transaction_log_model', 'trx_logs');

        // Proteksi: wajib login sebagai MEMBER
        if (
            !$this->session->userdata('user_id') ||
            $this->session->userdata('role') !== 'MEMBER'
        ) {
            redirect('login');
            exit;
        }
    }

    /** =========================
     *  PROFIL
     *  ========================= */
    public function profile()
    {
        $member_id = $this->session->userdata('member_id');

        $data['member'] = $this->members->find($member_id);

        $this->load->view('member/layouts/header');
        $this->load->view('member/profile', $data);
        $this->load->view('member/layouts/footer');
    }

    /** =========================
     *  RIWAYAT TRANSAKSI
     *  ========================= */
    public function transactions()
    {
        $member_id = $this->session->userdata('member_id');

        $data['list'] = $this->transactions->getByMember($member_id);

        $this->load->view('member/layouts/header');
        $this->load->view('member/transactions', $data);
        $this->load->view('member/layouts/footer');
    }

    /** =========================
     *  TOPUP FORM
     *  ========================= */
    public function topup()
    {
        $this->load->view('member/layouts/header');
        $this->load->view('member/topup_form');
        $this->load->view('member/layouts/footer');
    }

    /** =========================
     *  TOPUP SUBMIT
     *  ========================= */
    public function topup_submit()
    {
        $member_id = $this->session->userdata('member_id');
        $amount    = (int)$this->input->post('amount');

        if ($amount <= 0) {
            $data['error'] = "Nominal tidak valid.";
            $this->load->view('member/layouts/header');
            $this->load->view('member/topup_form', $data);
            $this->load->view('member/layouts/footer');
            return;
        }

        // Ambil data member
        $member = $this->members->find($member_id);
        if (!$member) {
            show_error("Member tidak ditemukan");
            return;
        }

        $before = (int)$member['current_balance'];
        $after  = $before + $amount;

        // Update saldo
        $this->members->updateBalance($member_id, $after);

        // Ambil transaction_type TOPUP
        $type = $this->trx_types->findByCode('TOPUP');

        // Insert transaksi
        $trx_id = $this->transactions->create([
            'member_id'           => $member_id,
            'transaction_type_id' => $type['id'],
            'amount'              => $amount,
            'balance_before'      => $before,
            'balance_after'       => $after,
            'channel'             => 'WEB',
        ]);

        // Log transaksi
        $this->trx_logs->createLog([
            'transaction_id' => $trx_id,
            'member_id'      => $member_id,
            'before_balance' => $before,
            'after_balance'  => $after
        ]);

        $this->session->set_flashdata('success', 'Topup berhasil!');
        redirect('member/profile');
    }


    /** =========================
     *  DONASI / PEMBELIAN FORM
     *  ========================= */
    public function donate()
    {
        $this->load->view('member/layouts/header');
        $this->load->view('member/donate_form');
        $this->load->view('member/layouts/footer');
    }

    /** =========================
     *  DONASI SUBMIT
     *  ========================= */
    public function donate_submit()
    {
        $member_id = $this->session->userdata('member_id');
        $amount    = (int)$this->input->post('amount');

        if ($amount <= 0) {
            $data['error'] = "Nominal tidak valid.";
            $this->load->view('member/layouts/header');
            $this->load->view('member/donate_form', $data);
            $this->load->view('member/layouts/footer');
            return;
        }

        $member = $this->members->find($member_id);
        if (!$member) {
            show_error("Member tidak ditemukan.");
            return;
        }

        $before = (int)$member['current_balance'];

        if ($before < $amount) {
            $data['error'] = "Saldo tidak cukup.";
            $this->load->view('member/layouts/header');
            $this->load->view('member/donate_form', $data);
            $this->load->view('member/layouts/footer');
            return;
        }

        $after = $before - $amount;

        // Update saldo
        $this->members->updateBalance($member_id, $after);

        // Ambil type PURCHASE
        $type = $this->trx_types->findByCode('PURCHASE');

        // Insert transaksi
        $trx_id = $this->transactions->create([
            'member_id'           => $member_id,
            'transaction_type_id' => $type['id'],
            'amount'              => $amount,
            'balance_before'      => $before,
            'balance_after'       => $after,
            'channel'             => 'WEB'
        ]);

        // Log transaksi
        $this->trx_logs->createLog([
            'transaction_id' => $trx_id,
            'member_id'      => $member_id,
            'before_balance' => $before,
            'after_balance'  => $after
        ]);

        $this->session->set_flashdata('success', 'Donasi / Pembelian berhasil!');
        redirect('member/profile');
    }
}
