<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Beranda';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// MEMBER
$route['api/members']['get']           = 'api/MemberApi/index';
$route['api/members']['post']          = 'api/MemberApi/create';
$route['api/members/(:num)']['get']    = 'api/MemberApi/show/$1';
$route['api/members/(:num)']['put']    = 'api/MemberApi/update/$1';
$route['api/members/(:num)']['patch']  = 'api/MemberApi/update/$1';
$route['api/members/(:num)']['delete'] = 'api/MemberApi/delete/$1';

// TRANSAKSI 
$route['api/members/(:num)/topup']['post']        = 'api/TransactionApi/topup/$1';
$route['api/members/(:num)/deduct']['post']       = 'api/TransactionApi/deduct/$1';
$route['api/members/(:num)/transactions']['get']  = 'api/TransactionApi/history/$1';

// LOGIN
$route['api/auth/login']['post'] = 'api/AuthApi/login';
