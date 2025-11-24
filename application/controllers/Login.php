<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'users');
        $this->load->model('User_token_model', 'tokens');
    }

    public function index()
    {
        $this->load->view('login/layouts/header');
        $this->load->view('login/index');
        $this->load->view('login/layouts/footer');
    }

    public function authenticate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->users->findByUsername($username);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            $data['error'] = "Username atau password salah.";
            $this->load->view('login/layouts/header');
            $this->load->view('login/index', $data);
            $this->load->view('login/layouts/footer');
            return;
        }

        // generate token
        $token = bin2hex(random_bytes(20));
        $expired_at = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $this->tokens->storeToken($user['id'], $token, $expired_at);

        // simpan ke session
        $this->session->set_userdata([
            'auth_token' => $token,
            'user_id'    => $user['id'],
            'role'       => $user['role'],
            'member_id'  => $user['member_id'], // untuk MEMBER
        ]);

        $this->session->set_flashdata('login_success', 'Login berhasil. Selamat datang!');


        if ($user['role'] === 'ADMIN' || $user['role'] === 'STAFF') {
            redirect('admin/members');
        }

        redirect('member/profile');
    }

    public function logout()
    {
        $this->session->unset_userdata(['auth_token', 'user_id', 'role', 'member_id']);
        redirect('login');
    }
}
