<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Authentication Middleware for API
 *
 * Hook akan memproteksi seluruh endpoint di bawah /api/*
 * kecuali yang didefinisikan sebagai public routes.
 */
class AuthHook
{

    public function run()
    {
        // Ambil instance CI
        $CI = &get_instance();

        // Pastikan URI dikenali oleh IDE
        /** @var CI_URI $CI_uri */
        $CI_uri = $CI->uri;

        // Ambil string URI yang sedang diakses
        /** @var string $uri */
        $uri = $CI_uri->uri_string();

        // Endpoint yang tidak butuh token
        $public_routes = [
            'api/auth/login',
        ];

        // Jika endpoint sedang diakses adalah termasuk yg public → skip
        if (in_array($uri, $public_routes, true)) {
            return;
        }

        // Proteksi semua endpoint yang dimulai dengan "/api/"
        if (strpos($uri, 'api/') === 0) {

            // Load library AuthLib
            $CI->load->library('AuthLib');

            /**
             * SIMPAN INSTANCE KE VARIABEL
             * Ini penting agar Intelephense mengenali tipe datanya.
             *
             * @var AuthLib $auth
             */
            $auth = new AuthLib();

            // Jalankan middleware
            $auth->check();
        }
    }
}
