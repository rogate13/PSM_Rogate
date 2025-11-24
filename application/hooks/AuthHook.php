<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthHook
{
    public function run()
    {
        $CI =& get_instance();
        $CI->load->library('session');

        $uri = uri_string();

        // ====== API TIDAK BOLEH DISENTUH HOOK ======
        if (strpos($uri, 'api/') === 0) {
            return; // <-- LEWATI
        }
        // ============================================

        // PUBLIC ROUTES (boleh diakses tanpa login)
        $public_routes = [
            '',
            'login',
            'login/authenticate',
            'logout',
        ];

        foreach ($public_routes as $pub) {
            if ($uri === $pub || strpos($uri, $pub . '/') === 0) {
                return;
            }
        }

        // Jika akses halaman admin/member tapi belum login → redirect
        if (strpos($uri, 'admin/') === 0 || strpos($uri, 'member/') === 0) {
            if (!$CI->session->userdata('user_id')) {
                redirect('login');
                exit;
            }
        }
    }
}
