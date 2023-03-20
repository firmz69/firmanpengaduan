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
$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// view masyarakat
$route['dashboard_masyarakat'] = 'C_firman_dashboard';
$route['pengaduan_masyarakat'] = 'C_firman_dashboard/pengaduan';
$route['profile_masyarakat'] = 'C_firman_dashboard/profile';
$route['riwayat_masyarakat'] = 'C_firman_dashboard/riwayat';

// view admin
$route['dashboard_admin'] = 'C_firman_dashboard/admin';
$route['kategori_admin'] = 'C_firman_dashboard/kategori';
$route['petugas_admin'] = 'C_firman_dashboard/petugas';
$route['masyarakat_admin'] = 'C_firman_dashboard/masyarakat';
$route['riwayat_admin'] = 'C_firman_dashboard/riwayat_admin';

// view petugas
$route['dashboard_petugas'] = 'C_firman_dashboard/admin_petugas';
$route['kategori_petugas'] = 'C_firman_dashboard/tabel_kategori';
$route['petugas_petugas'] = 'C_firman_dashboard/tabel_petugas';
$route['masyarakat_petugas'] = 'C_firman_dashboard/tabel_masyarakat';
$route['riwayat_petugas'] = 'C_firman_dashboard/riwayat_petugas';


// sistem crud admin : petugas, kategori, subkategori
$route['tambah_petugas'] = 'Auth/registrasi_admin';
$route['tambah_kategori'] = 'C_firman_Update/tambahKategori';
$route['tambah_subkategori'] = 'C_firman_Update/tambahSubKategori';
$route['hapus_kategori/(:num)'] = 'C_firman_Update/hapusKategori/$1';
$route['laporan_pdf'] = 'C_firman_Update/laporan_pdf';

// login register logout masyarakat
$route['registrasi'] = 'Auth/registrasi';
$route['login'] = 'Auth';
$route['logout'] = 'Auth/logout';
$route['edit_profile'] = 'C_firman_Update/editProfile';

// login setup admin
$route['setup_admin'] = 'Auth/setup_admin';
$route['login_admin'] = 'Auth/login_petugas';
$route['logout_admin'] = 'Auth/logout_admin';

// pengaduan masyarakat
$route['masyarakat_pengaduan'] = 'C_firman_Update/tambahPengaduan';
