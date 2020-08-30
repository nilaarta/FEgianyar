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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// auth
$route['login'] = 'auth/index';
$route['logout'] = 'auth/logout';
$route['post_login'] = 'auth/login';

$route['pertanyaan'] = 'pertanyaan';
$route['get_pertanyaan'] = 'pertanyaan/get_pertanyaan';
$route['add_pertanyaan'] = 'pertanyaan/add_pertanyaan';
$route['add_pertanyaan_isian'] = 'pertanyaan/add_pertanyaan_isian';
$route['delete_pertanyaan'] = 'pertanyaan/delete_pertanyaan';

$route['get_jawaban'] = 'pertanyaan/get_jawaban';
$route['update_pertanyaan'] = 'pertanyaan/update_pertanyaan';
$route['update_pertanyaan_isian'] = 'pertanyaan/update_pertanyaan_isian';
$route['get_dashboard'] = 'dashboard/get_dashboard';
$route['get_chart'] = 'dashboard/get_chart';

$route['kontak'] = 'kontak';

$route['perijinan'] = 'perijinan';

$route['subdomain'] = 'subdomain';

//profile
$route['sejarah'] = 'profile/sejarah';
$route['petakabupaten'] = 'profile/petakabupaten';
$route['artilambang'] = 'profile/artilambang';
$route['gianyardalamangka'] = 'profile/gianyardalamangka';
$route['bupatidarimasa'] = 'profile/bupatidarimasa';

//pemerintah, 
$route['visidanmisi'] = 'pemerintahan/visidanmisi';
$route['tujuandansasaran'] = 'pemerintahan/tujuandansasaran';
$route['strukturorganisasi'] = 'pemerintahan/strukturorganisasi';
$route['alamatinstansi'] = 'pemerintahan/alamatinstansi';
///perangkatpemerintahan


$route['bupati'] = 'pemerintahan/perangkat/bupati';
$route['wakilbupati'] = 'pemerintahan/perangkat/wakilbupati';
$route['sekretariatdaerah'] = 'pemerintahan/perangkat/sekretariatdaerah';
$route['sekretariatdewan'] = 'pemerintahan/perangkat/sekretariatdewan';
$route['inspektorat'] = 'pemerintahan/perangkat/inspektorat';
$route['bappenda'] = 'pemerintahan/perangkat/bappenda';
$route['dinasdaerah'] = 'pemerintahan/perangkat/dinasdaerah';
$route['kecamatan'] = 'pemerintahan/perangkat/kecamatan';
$route['badan'] = 'pemerintahan/perangkat/badan';

// $route['bupati'] = 'pemerintahan/perangkatdaerah/bupati';
// $route['wakilbupati'] = 'pemerintahan/perangkatdaerah/wakilbupati';
// $route['sekretariatdaerah'] = 'pemerintahan/perangkatdaerah/sekretariatdaerah';
// $route['sekretariatdewan'] = 'pemerintahan/perangkatdaerah/sekretariatdewan';
// $route['inspektorat'] = 'pemerintahan/perangkatdaerah/inspektorat';
// $route['bappenda'] = 'pemerintahan/perangkatdaerah/bappenda';
// $route['dinasdaerah'] = 'pemerintahan/perangkatdaerah/dinasdaerah';
// $route['kecamatan'] = 'pemerintahan/perangkatdaerah/kecamatan';
// $route['badan'] = 'pemerintahan/perangkatdaerah/badan';


///laporan
$route['lakip'] = 'pemerintahan/laporan/lakip';
$route['perjanjiankinerja'] = 'pemerintahan/aporan/perjanjiankinerja';
$route['rencanaaksi'] = 'pemerintahan/laporan/rencanaaksi';
$route['renstra'] = 'pemerintahan/laporan/renstra';
$route['renja'] = 'pemerintahan/laporan/renja';
$route['iku'] = 'pemerintahan/laporan/iku';

// $route['lakip'] = 'pemerintahan/laporan/lakip';
// $route['perjanjiankinerja'] = 'pemerintahan/laporan/perjanjiankinerja';
// $route['rencanaaksi'] = 'pemerintahan/laporan/rencanaaksi';
// $route['renstra'] = 'pemerintahan/laporan/renstra';
// $route['renja'] = 'pemerintahan/laporan/renja';
// $route['iku'] = 'pemerintahan/laporan/iku';

///info gianyar
$route['berita'] = 'infogianyar/berita';
$route['artikel'] = 'infogianyar/artikel';
$route['koranpaswara'] = 'infogianyar/koranpaswara';
$route['pariwisata'] = 'infogianyar/pariwisata';
$route['teleponpenting'] = 'infogianyar/teleponpenting';

///saran
$route['kirimsaran'] = 'saran/kirimsaran';
$route['daftarsaran'] = 'saran/daftarsaran';
$route['detailsaran'] = 'saran/detailsaran';

//dashboard
$route['pengumuman'] = 'beranda/pengumuman';
$route['agendakegiatan'] = 'beranda/agendakegiatan';

//galeri
$route['foto'] = 'galeri/foto';
$route['video'] = 'galeri/video';

//detail
$route['detailberita'] = 'detail/berita';
$route['detailartikel'] = 'detail/artikel';
$route['detailfoto'] = 'detail/foto';
$route['detailvideo'] = 'detail/video';
$route['detailpengumuman'] = 'detail/pengumuman';
$route['detailagendakegiatan'] = 'detail/agendakegiatan';















