<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedirectLogin {

    public function check()
    {
        $CI =& get_instance();

        $CI->load->library('session');

        $current = uri_string();

        // halaman yang tidak butuh login
        $public_routes = [
            'login',
            'login/authenticate',
        ];

        // Jika current URL termasuk public, biarkan
        if (in_array($current, $public_routes)) {
            return;
        }

        // Jika belum login → paksa ke login
        if (!$CI->session->userdata('auth_token')) {
            if ($current !== 'login') {
                redirect('login');
                exit;
            }
        } 
        else 
        {
            // Jika sudah login, cek akses root ("/")
            if ($current === '' || $current === '/') {
                $role = $CI->session->userdata('role');

                if ($role === 'ADMIN' || $role === 'STAFF') {
                    redirect('admin/members');
                    exit;
                }

                if ($role === 'MEMBER') {
                    redirect('member/profile');
                    exit;
                }
            }
        }
    }
}
