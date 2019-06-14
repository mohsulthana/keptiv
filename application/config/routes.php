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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Lower
$route['popular'] = 'viral/popularSeminggu';
$route['kontak'] = 'pengaduan/kontak';
$route['privacy'] = 'pengaduan/privacy';
$route['disclaimer'] = 'pengaduan/disclaimer';
$route['tentang'] = 'pengaduan/tentang';

// Upper
$route['Popular'] = 'viral/popularSeminggu';
$route['Kontak'] = 'pengaduan/kontak';
$route['Privacy'] = 'pengaduan/privacy';
$route['Disclaimer'] = 'pengaduan/disclaimer';
$route['Tentang'] = 'pengaduan/tentang';

// Viral
$route['Viral'] = 'Viral';
$route['Viral/sub_category/(:any)'] = 'Viral/index/$1';
$route['viral'] = 'Viral';
$route['viral/sub_category/(:any)'] = 'Viral/index/$1';

// Opini
$route['Opini'] = 'Opini';
$route['Opini/sub_category/(:any)'] = 'Opini/index/$1';
$route['opini'] = 'Opini';
$route['opini/sub_category/(:any)'] = 'Opini/index/$1';

// Unik
$route['Unik'] = 'Unik';
$route['Unik/sub_category/(:any)'] = 'Unik/index/$1';
$route['unik'] = 'Unik';
$route['unik/sub_category/(:any)'] = 'Unik/index/$1';

// Sport
$route['Sport'] = 'Sport';
$route['Sport/sub_category/(:any)'] = 'Sport/index/$1';
$route['sport'] = 'Sport';
$route['sport/sub_category/(:any)'] = 'Sport/index/$1';