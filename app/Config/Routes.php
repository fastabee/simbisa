<?php

use App\Controllers\Register;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('logout', 'Login::logout');
$routes->get('/cekrole', 'Home::cekrole');
$routes->get('dashboard', 'Home::index');

$routes->get('lupa/password', 'Home::awal');
$routes->post('reset/user', 'Home::akhir');
$routes->get('setel/password/(:segment)', 'Home::setelpw/$1');
$routes->post('setpw', 'Home::setpw');

$routes->get('profil/admin', 'Home::ProfilAdmin');
$routes->post('update/Admin', 'Home::updateAdmin');

$routes->get('profil/dosen', 'Home::ProfilDosen');
$routes->get('profil/mahasiswa', 'Home::ProfilMahasiswa');

$routes->get('tes', 'Home::tesin');

$routes->get('login', 'Login::index');

$routes->post('login/user', 'Login::login');

$routes->get('register', 'Register::index');

$routes->post('register/user', 'Register::insert');

$routes->get('pedoman', 'Pedoman::index');

$routes->get('input/pedoman', 'Pedoman::input');

$routes->post('tambah/pedoman', 'Pedoman::insert');

$routes->get('edit/pedoman/(:num)', 'Pedoman::edit/$1');

$routes->post('update/pedoman/(:num)', 'Pedoman::update/$1');

$routes->get('delete/pedoman/(:num)', 'Pedoman::delete/$1');

$routes->get('dosen/list', 'Dosen::index');
$routes->get('input/dosen', 'Dosen::input');
$routes->post('tambah/dosen', 'Dosen::insert');
$routes->get('edit/dosen/(:segment)', 'Dosen::edit/$1');
$routes->post('update/dosen/(:segment)', 'Dosen::update/$1');
$routes->post('update/dosen2/(:segment)', 'Dosen::update2/$1');
$routes->get('delete/dosen/(:segment)', 'Dosen::delete/$1');


$routes->get('mahasiswa/list', 'Mahasiswa::index');
$routes->get('input/mahasiswa', 'Mahasiswa::input');
$routes->post('tambah/mahasiswa', 'Mahasiswa::insert');
$routes->get('edit/mahasiswa/(:segment)', 'Mahasiswa::edit/$1');
$routes->post('update/mahasiswa/(:segment)', 'Mahasiswa::update/$1');
$routes->post('update/mahasiswa2/(:segment)', 'Mahasiswa::update2/$1');
$routes->get('delete/mahasiswa/(:segment)', 'Mahasiswa::delete/$1');


$routes->get('pembagian/list', 'Pembagian::index');
$routes->get('edit/pembagian/(:segment)', 'Pembagian::edit/$1');
$routes->post('update/pembagian', 'Pembagian::update');

$routes->get('dashboard/mahasiswa', 'Home::indexM');
$routes->get('dashboard/dosen', 'Home::indexD');

$routes->get('infoproposal', 'Mahasiswa::forsempro');
$routes->get('infoskripsi', 'Mahasiswa::forskripsi');

$routes->get('izinsidang', 'Mahasiswa::perizinan');
$routes->get('mantap/proposal/(:segment)', 'Mahasiswa::update_pr/$1');
$routes->get('mantap/skripsi/(:segment)', 'Mahasiswa::update_skr/$1');




//role dosen
// info bimbinga 1
$routes->get('bimbingan1', 'Dosen::infoBimbingan1');
//terima judul
$routes->get('terima/judul/(:num)', 'Dosen::terimajudul/$1');
//toal judul
$routes->get('tolak/judul/(:num)', 'Dosen::tolakjudul/$1');

$routes->get('bimbingan2', 'Dosen::infoBimbingan2');

$routes->get('acc/judul/(:segment)', 'Dosen::acc_judul/$1');

//presensi
$routes->get('presensi/list', 'Dosen::presensi');
$routes->get('presensi/detail/(:segment)', 'Dosen::presensi_detail/$1');
$routes->post('tambah/presensi', 'Dosen::input_presensi');

//
$routes->get('proposal/izin', 'Dosen::izin_proposaldosen');
$routes->get('gas/proposal/(:segment)', 'Dosen::gas_proposal/$1');

$routes->get('skripsi/izin', 'Dosen::izin_skripsidosen');
$routes->get('gas/skripsi/(:segment)', 'Dosen::gas_skripsi/$1');

$routes->get('jadwal', 'Home::jadwal');
$routes->Post('update/jadwal', 'Home::updatejadwal');
$routes->Post('update/link', 'Home::updatelink');



//roleMahasiswa
$routes->get('pedoman/mahasiswa', 'Mahasiswa::buku_pedoman');
$routes->get('pembimbing/mahasiswa', 'Mahasiswa::info_pembimbing');

// pengajuan judul
//list
$routes->get('pengdul/mahasiswa', 'Mahasiswa::pengajuan_judul');
//input
$routes->get('input/pengdul/mahasiswa', 'Mahasiswa::ajukan_judul');
$routes->post('ajukan/judul', 'Mahasiswa::input_judul');

//presensi
$routes->get('presensi/mahasiswa1', 'Mahasiswa::presensi1');
$routes->get('presensi/mahasiswa2', 'Mahasiswa::presensi2');

//aju
$routes->get('aju/proposal', 'Mahasiswa::ajuproposal');
$routes->post('tambah/ajuproposal', 'Mahasiswa::tambahaju');
$routes->get('aju/skripsi', 'Mahasiswa::ajuskripsi');
$routes->post('tambah/ajuskripsi', 'Mahasiswa::tambahaju2');

$routes->get('ig', 'Home::ig');
$routes->get('fb', 'Home::fb');
$routes->get('web', 'Home::web');

$routes->get('jadwalM', 'Home::jadwalm');
$routes->get('jadwalD', 'Home::jadwald');
$routes->get('/', 'Home::gome');


//tes;repw
$routes->get('tesmail', 'Dosen::emailnya');
