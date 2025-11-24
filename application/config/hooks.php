<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller_constructor'][] = [
    'class'    => 'AuthHook',
    'function' => 'run',
    'filename' => 'AuthHook.php',
    'filepath' => 'hooks'
];

// $hook['post_controller_constructor'][] = [
//     'class'    => 'RedirectLogin',
//     'function' => 'check',
//     'filename' => 'RedirectLogin.php',
//     'filepath' => 'hooks'
// ];
