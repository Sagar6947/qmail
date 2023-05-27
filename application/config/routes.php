<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Home/login';
$route['register'] = 'Home/register';
$route['logout'] = 'Home/logout';
$route['inbox'] = 'Home/index';
$route['read-mail'] = 'Home/read_mail';
$route['sent'] = 'Home/sent';