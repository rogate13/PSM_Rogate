<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthLib
{

    /**
     * Auth Middleware Library
     * @var CI_Controller|CI_Model|object
     * @property CI_Input $input
     * @property CI_Output $output
     * @property CI_DB_query_builder $db
     */
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    /**
     * Check Authorization: Bearer <token>
     */
    public function check()
    {
        $authHeader = $this->CI->input->get_request_header('Authorization');

        if (!$authHeader || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $this->unauthorized("Token missing.");
        }

        $token = $matches[1];

        // Validate token in DB
        $user = $this->CI->db
            ->select('users.id, users.username, users.role')
            ->from('user_tokens')
            ->join('users', 'users.id = user_tokens.user_id')
            ->where('user_tokens.token', $token)
            ->where('user_tokens.expired_at >=', date('Y-m-d H:i:s'))
            ->get()
            ->row_array();

        if (!$user) {
            $this->unauthorized("Invalid or expired token.");
        }

        // Make user data available app-wide
        $this->CI->auth_user = $user;

        return true;
    }

    private function unauthorized($message)
    {
        $this->CI->output
            ->set_status_header(401)
            ->set_content_type('application/json')
            ->set_output(json_encode(['message' => $message]))
            ->_display();
        exit;
    }
}
