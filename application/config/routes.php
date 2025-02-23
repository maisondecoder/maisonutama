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
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';

$route['furniture-brand'] = 'main/brands';
$route['about-us-maison-living'] = 'main/about_us';
$route['collections'] = 'main/collections';
$route['our-collections/(:any)'] = 'main/product_detail/$1';
$route['our-collections/(:any)/(:any)'] = 'main/product_detail/$1/$2';
$route['our-projects/(:any)'] = 'main/our_project/$1';
$route['room/(:any)'] = 'main/room/$1';
$route['room/(:any)/(:num)'] = 'main/room/$1/$2';
$route['category/(:any)'] = 'main/cat/$1';
$route['category/(:any)/(:num)'] = 'main/cat/$1/$2';
$route['(:any)'] = 'main/brand_detail/$1';
$route['(:any)/(:num)'] = 'main/brand_detail/$1/$2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Landing Page */
$route['p/contact-us'] = 'main/testlanding';
$route['p/contact-us-pkj'] = 'landing/landingpakarjasa';
$route['p/black-friday-2024'] = 'landing/blackfriday2024';
$route['p/christmas-sale-2024'] = 'landing/christmas2024';
