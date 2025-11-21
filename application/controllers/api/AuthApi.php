<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Auth API Controller
 *
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Loader $load
 *
 * @property User_model $users
 * @property Login_log_model $loginLog
 */
class AuthApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', 'users');
        $this->load->model('Login_log_model', 'loginLog');
    }

    private function response($data, $status = 200)
    {
        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    /* ==========================================================
        POST /api/auth/login
    =========================================================== */
    public function login()
    {
        $payload = json_decode($this->input->raw_input_stream, true);

        if (empty($payload['username']) || empty($payload['password'])) {
            return $this->response(['message' => 'Username & password required'], 422);
        }

        $username = $payload['username'];
        $password = $payload['password'];

        $user = $this->users->findByUsername($username);

        if (!$user || !password_verify($password, $user['password_hash'])) {

            // Log FAILED
            $this->loginLog->createLog([
                'user_id'    => $user['id'] ?? 0,
                'ip_address' => $this->input->ip_address(),
                'user_agent' => $this->input->user_agent(),
                'status'     => 'FAILED'
            ]);

            return $this->response(['message' => 'Invalid username or password'], 401);
        }

        // Generate token (simple version)
        $token = bin2hex(random_bytes(32));

        // Log SUCCESS
        $this->loginLog->createLog([
            'user_id'    => $user['id'],
            'ip_address' => $this->input->ip_address(),
            'user_agent' => $this->input->user_agent(),
            'status'     => 'SUCCESS'
        ]);

        return $this->response([
            'message' => 'Login success',
            'user' => [
                'id'       => $user['id'],
                'username' => $user['username'],
                'role'     => $user['role']
            ],
            'token' => $token
        ]);
    }
}
