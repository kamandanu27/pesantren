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
$route['administrator']='admin/login';

$route['artikel']='blog/artikel';
$route['artikel/(:any)']='blog/detail_artikel/$1';

$route['berita']='blog/berita';
$route['berita/(:any)']='blog/detail_berita/$1';

$route['kompetensi']='kompetensi/index';
$route['kompetensi/(:any)']='kompetensi/index/$1';

$route['admin/artikel/handleimage']='admin/artikel/handleimage';
$route['admin/artikel/add']='admin/artikel/add';
$route['admin/artikel/editp/(:any)']='admin/artikel/editp/$1';
$route['admin/artikel/insert']='admin/artikel/insert';
$route['admin/artikel/update']='admin/artikel/update';
$route['admin/artikel/update_publis_user']='admin/artikel/update_publis_user';
$route['admin/artikel/delete']='admin/artikel/delete';
$route['admin/artikel/update_status']='admin/artikel/update_status';
$route['admin/artikel/deletesoft']='admin/artikel/deletesoft';

$route['admin/artikel']='admin/artikel/add';
$route['admin/artikel/(:any)']='admin/artikel/view/$1';

$route['admin/berita/add']='admin/berita/add';
$route['admin/berita/editp/(:any)']='admin/berita/editp/$1';
$route['admin/berita/insert']='admin/berita/insert';
$route['admin/berita/update']='admin/berita/update';
$route['admin/berita/update_publis_user']='admin/berita/update_publis_user';
$route['admin/berita/delete']='admin/berita/delete';
$route['admin/berita/update_status']='admin/berita/update_status';
$route['admin/berita/deletesoft']='admin/berita/deletesoft';

$route['admin/berita']='admin/berita/add';
$route['admin/berita/(:any)']='admin/berita/view/$1';

$route['album']='album/index';
$route['album/(:any)']='album/index/$1';
$route['visi-dan-misi']='visimisi';
$route['tujuan-target-pendidikan'] = 'tujuan';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;