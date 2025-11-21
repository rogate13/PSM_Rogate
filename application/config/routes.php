<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Beranda';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['api/members']['post'] = 'api/MemberApi/create';
$route['api/members/(:num)']['get'] = 'api/MemberApi/show/$1';
$route['api/members/(:num)/topup']['post'] = 'api/MemberApi/topup/$1';
$route['api/members/(:num)/deduct']['post'] = 'api/TransactionApi/deduct/$1';
$route['api/members/(:num)/transactions']['get'] = 'api/TransactionApi/index/$1';