<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'webapp/home/index';
/*$route['loc/(:any)/order-successful'] = 'mypopcoins/cart/order_successful/$1';
$route['loc/(:any)/order-unsuccessful'] = 'mypopcoins/cart/order_unsuccessful/$1';
$route['loc/(:any)/confirm-order'] = 'mypopcoins/detail/confirm_order/$1';
$route['loc/(:any)/booking-reserve/(:any)'] = 'mypopcoins/detail/booking_reserve/$1/$2';
$route['loc/(:any)/signin/(:any)'] = 'mypopcoins/home/checkout/$1/$2';
$route['loc/(:any)/(:any)/(:any)'] = 'mypopcoins/detail/details/$1/$2/$3';
$route['loc/(:any)/(:any)'] = 'mypopcoins/search/listing/$1/$2';
$route['loc/(:any)'] = 'mypopcoins/home/index/$1';
$route['loc'] = 'mypopcoins/home/index';
$route['admin'] = 'admin/login';
$route['payumoney-payment'] = 'mypopcoins/cart/payumoney_payment';*/

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
	