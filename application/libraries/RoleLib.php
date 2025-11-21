<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RoleLib
{

    /**
     * Role Middleware Library
     * @var object
     * @property CI_Output $output
     */
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    /**
     * Require a specific role for accessing API
     *
     * @param string|array $roles
     */
    public function require($roles)
    {
        // Ambil user hasil auth
        $user = $this->CI->auth_user ?? null;

        if (!$user) {
            return $this->forbidden("User not authenticated.");
        }

        // Normalisasi roles ke array
        $roles = is_array($roles) ? $roles : [$roles];

        if (!in_array($user['role'], $roles)) {
            return $this->forbidden("Access denied: {$user['role']} is not allowed.");
        }

        return true;
    }

    private function forbidden($message)
    {
        $this->CI->output
            ->set_status_header(403)
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'message' => $message
            ]))
            ->_display();

        exit;
    }
}
