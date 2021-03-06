<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['sign_up']  = "user/sign_up";
$route['sign_in']  = "user/sign_in";
$route['sign_out'] = "user/sign_out";

/* Home Controller */
$route['(:num)'] = 'home/index/$1';
$route['broadcaster'] = 'home/broadcaster';
$route['all_programs'] = 'home/all_programs';
$route['privacy'] = 'home/privacy';
$route['contact'] = 'home/contact';
$route['good/(:num)']          = 'home/good/$1';
$route['good_delete/(:num)']   = 'home/good_delete/$1';
$route['change'] = 'home/change';
$route['unsubscribe'] = 'home/unsubscribe';



/* Thread Controller */
$route['newpost'] = 'thread/newpost';

/* Programs Controller */
$route['program/(:any)'] = "program/index/$1";

/* AdminController */
$route['admin'] = 'admin/home/index';

/* Programrelated */
$routes['admin/programrelated/broadcasters_detail/(:num)'] = "admin/programrelated/broadcasters_detail/$1";

/* admin/thraed */


/* admin-Login */
$routes['admin/login']  = "admin/login/index";
$routes['admin/logout'] = "admin/login/logout";