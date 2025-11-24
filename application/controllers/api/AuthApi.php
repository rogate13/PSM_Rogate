<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthApi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'users');
        $this->load->model('Login_log_model', 'loginLog');
    }

    public function login()
    {
        $payload = json_decode($this->input->raw_input_stream, true);

        if (!$payload || empty($payload['username']) || empty($payload['password'])) {
            return $this->json(['message' => 'Username & password required'], 422);
        }

        $user = $this->users->findByUsername($payload['username']);

        if (!$user || !password_verify($payload['password'], $user['password_hash'])) {
            $this->loginLog->createLog([
                'user_id' => $user['id'] ?? 0,
                'ip_address' => $this->input->ip_address(),
                'user_agent' => $this->input->user_agent(),
                'status' => 'FAILED'
            ]);

            return $this->json(['message' => 'Invalid username or password'], 401);
        }

        $token = bin2hex(random_bytes(32));
        $this->users->save_token($user['id'], $token);

        $this->loginLog->createLog([
            'user_id' => $user['id'],
            'ip_address' => $this->input->ip_address(),
            'user_agent' => $this->input->user_agent(),
            'status' => 'SUCCESS'
        ]);

        return $this->json([
            'message' => 'Login success',
            'user' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role']
            ],
            'token' => $token
        ]);
    }
}
