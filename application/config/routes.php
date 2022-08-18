<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'Page/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//page
$route['login'] = 'Page/login';
$route['proses_login'] = 'Page/proses_login';
$route['dashboard'] = 'Page/home';
$route['home'] = 'Page/home';
$route['sistem_pakar'] = 'Page/sistem_pakar';
$route['proses_rekomendasi'] = 'Page/proses_rekomendasi';

//admin
$route['dashboard_admin'] = 'Admin/dashboard_admin';
$route['profile'] = 'Admin/profile';
$route['proses_edit_profile'] = 'Admin/proses_edit_profile';
$route['simpan_bobot'] = 'Admin/simpan_bobot';
$route['simpan_bobot/(:any)/(:any)/(:any)'] = 'Admin/simpan_bobot/$1/$2/$3';
$route['logout'] = 'Page/logout';
//data admin
$route['data_admin'] = 'Admin/data_admin';
$route['tambah_admin'] = 'Admin/tambah_admin';
$route['proses_tambah_admin'] = 'Admin/proses_tambah_admin';
$route['proses_edit_admin'] = 'Admin/proses_edit_admin';
$route['edit_admin/(:any)'] = 'Admin/edit_admin/$1';
$route['delete_admin/(:any)'] = 'Admin/delete_admin/$1';
$route['edit_admin'] = 'Admin/edit_admin';
$route['delete_admin'] = 'Admin/delete_admin';
//data keterangan
$route['data_keterangan'] = 'Admin/data_keterangan';
$route['tambah_keterangan'] = 'Admin/tambah_keterangan';
$route['proses_tambah_keterangan'] = 'Admin/proses_tambah_keterangan';
$route['proses_edit_keterangan'] = 'Admin/proses_edit_keterangan';
$route['edit_keterangan/(:any)'] = 'Admin/edit_keterangan/$1';
$route['delete_keterangan/(:any)'] = 'Admin/delete_keterangan/$1';
$route['edit_keterangan'] = 'Admin/edit_keterangan';
$route['delete_keterangan'] = 'Admin/delete_keterangan';
//data kb
$route['data_kb'] = 'Admin/data_kb';
$route['tambah_kb'] = 'Admin/tambah_kb';
$route['proses_tambah_kb'] = 'Admin/proses_tambah_kb';
$route['proses_edit_kb'] = 'Admin/proses_edit_kb';
$route['edit_kb/(:any)'] = 'Admin/edit_kb/$1';
$route['delete_kb/(:any)'] = 'Admin/delete_kb/$1';
$route['edit_kb'] = 'Admin/edit_kb';
$route['delete_kb'] = 'Admin/delete_kb';
//data kasus
$route['data_kasus'] = 'Admin/data_kasus';
//aturan
$route['aturan'] = 'Admin/aturan';
