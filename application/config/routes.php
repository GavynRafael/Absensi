<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['arsipAdmin/cuti'] = 'arsipAdmin/index';
$route['HapusUser/(:any)'] = 'HapusUser/delete/$1';
$route['editUser/(:any)'] = 'editUser/index/$1';




?>