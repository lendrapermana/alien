<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['company/(:any)'] = 'my_company/index/$1';
$route['user/(:any)'] = 'my_profile/index/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
