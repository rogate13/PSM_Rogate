<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthHook
{
    public function run()
    {
        $CI =& get_instance();
        $CI->load->library('session');      // ⬅️ WAJIB supaya $CI->session ada

        $uri = uri_string(); // "", "login", "api/members", "admin/dashboard"

        // ROUTE YANG TIDAK BOLEH DIHADANG
        $public_routes = [
            '',                     // default_controller
            'login',
            'login/authenticate',
            'logout',
            'register',
            'assets',
        ];

        foreach ($public_routes as $pub) {
            if ($uri === $pub || strpos($uri, $pub . '/') === 0) {
                return;
            }
        }

        // Proteksi hanya untuk API (JWT)
        if (strpos($uri, 'api/') === 0) {
            $CI->load->library('AuthLib', null, 'authlib');
            $CI->authlib->check();
            return;
        }

        // Proteksi untuk halaman admin/member berbasis SESSION
        if (strpos($uri, 'admin/') === 0 || strpos($uri, 'member/') === 0) {
            if (!$CI->session->userdata('user_id')) {
                redirect('login');
                exit;
            }
        }
    }
}
