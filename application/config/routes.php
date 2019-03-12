<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'sendmail';
$route['send'] = 'sendmail/sendemail';
$route['view'] = 'sendmail/viewDetail';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
