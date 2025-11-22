<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Login';
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

// ADMIN – ALL TRANSACTIONS
$route['api/transactions'] = 'api/TransactionApi/all';
$route['api/my/transactions'] = 'api/TransactionApi/myTransactions';

// LOGIN
$route['api/auth/login']['post'] = 'api/AuthApi/login';

// ADMIN VIEW
$route['admin/members'] = 'AdminView/members';
$route['admin/members/(:num)'] = 'AdminView/member_detail/$1';
$route['admin/transactions'] = 'AdminView/transactions';

// MEMBER VIEW
$route['member/profile'] = 'MemberView/profile';
$route['member/transactions'] = 'MemberView/transactions';

// LOGIN
$route['login'] = 'Login/index';
$route['login/authenticate'] = 'Login/authenticate';
$route['logout'] = 'Login/logout';
