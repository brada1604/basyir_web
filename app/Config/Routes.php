<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/kota', 'Home::index2');

// ROUTE AUTH
$routes->get('/login', 'AuthController::index'); // untuk login
$routes->get('/logout', 'AuthController::logout'); // untuk logout
$routes->post('/login/auth', 'AuthController::auth'); // untuk checking data login
$routes->get('/register', 'RegisterController::index'); // untuk register data
$routes->post('/register/save', 'RegisterController::save'); // untuk menyimpan user baru

// ROUTE AMALAN YAUMI
$routes->get('/amalan_yaumi', 'AmalanYaumiController::display'); // untuk menampilkan data
$routes->get('/amalan_yaumi_master', 'AmalanYaumiController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/amalan_yaumi/add', 'AmalanYaumiController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/amalan_yaumi/save', 'AmalanYaumiController::save'); // untuk menyimpan data
$routes->get('/amalan_yaumi/(:segment)', 'AmalanYaumiController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/amalan_yaumi/edit/(:segment)', 'AmalanYaumiController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/amalan_yaumi/edit_status/(:segment)/(:segment)', 'AmalanYaumiController::edit_status/$1/$2', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/amalan_yaumi/update', 'AmalanYaumiController::update'); // untuk mengupdate data
$routes->get('/amalan_yaumi/delete/(:segment)', 'AmalanYaumiController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/amalan_yaumi/search', 'AmalanYaumiController::search'); // untuk mencari data berdasarkan variable tertentu


// ROUTE DOA
$routes->get('/doa', 'DoaController::display'); // untuk menampilkan data
$routes->get('/doa_master', 'DoaController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/doa/add', 'DoaController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->get('/doa/add_detail/(:segment)', 'DoaController::add_detail/$1', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/doa/save', 'DoaController::save'); // untuk menyimpan data
$routes->post('/doa/save_detail', 'DoaController::save_detail'); // untuk menyimpan data
$routes->get('/doa/detail/(:segment)', 'DoaController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/doa/edit/(:segment)', 'DoaController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/doa/edit_detail/(:segment)/(:segment)', 'DoaController::edit_detail/$1/$2', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/doa/edit_status/(:segment)/(:segment)', 'DoaController::edit_status/$1/$2', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/doa/edit_status_detail/(:segment)/(:segment)/(:segment)', 'DoaController::edit_status_detail/$1/$2/$3', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/doa/update', 'DoaController::update'); // untuk mengupdate data
$routes->post('/doa/update_detail', 'DoaController::update_detail'); // untuk mengupdate data
$routes->get('/doa/delete/(:segment)', 'DoaController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/doa/delete_detail/(:segment)/(:segment)', 'DoaController::delete_detail/$1/$2', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/doa/search', 'DoaController::search'); // untuk mencari data berdasarkan variable tertentu


//ROUTE KATEGORI BERITA
$routes->get('/kategori_berita', 'KategoriBeritaController::display'); // untuk menampilkan data
$routes->get('/kategori_berita_master', 'KategoriBeritaController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/kategori_berita/add', 'KategoriBeritaController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/kategori_berita/save', 'KategoriBeritaController::save'); // untuk menyimpan data
$routes->get('/kategori_berita/(:segment)', 'KategoriBeritaController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/kategori_berita/edit/(:segment)', 'KategoriBeritaController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/kategori_berita/edit_status/(:segment)/(:segment)', 'KategoriBeritaController::edit_status/$1/$2', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/kategori_berita/update', 'KategoriBeritaController::update'); // untuk mengupdate data
$routes->get('/kategori_berita/delete/(:segment)', 'KategoriBeritaController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/kategori_berita/search', 'KategoriBeritaController::search'); // untuk mencari data berdasarkan variable tertentu


//ROUTE KATEGORI WAWASAN ISLAMI
$routes->get('/kategori_wawasan_islami', 'KategoriWawasanIslamiController::display'); // untuk menampilkan data
$routes->get('/kategori_wawasan_islami_master', 'KategoriWawasanIslamiController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/kategori_wawasan_islami/add', 'KategoriWawasanIslamiController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/kategori_wawasan_islami/save', 'KategoriWawasanIslamiController::save'); // untuk menyimpan data
$routes->get('/kategori_wawasan_islami/(:segment)', 'KategoriWawasanIslamiController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/kategori_wawasan_islami/edit/(:segment)', 'KategoriWawasanIslamiController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/kategori_wawasan_islami/edit_status/(:segment)/(:segment)', 'KategoriWawasanIslamiController::edit_status/$1/$2', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/kategori_wawasan_islami/update', 'KategoriWawasanIslamiController::update'); // untuk mengupdate data
$routes->get('/kategori_wawasan_islami/delete/(:segment)', 'KategoriWawasanIslamiController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/kategori_wawasan_islami/search', 'KategoriWawasanIslamiController::search'); // untuk mencari data berdasarkan variable tertentu


//ROUTE KUTIPAN
$routes->get('/kutipan', 'KutipanController::display'); // untuk menampilkan data
$routes->get('/kutipan_master', 'KutipanController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/kutipan/add', 'KutipanController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/kutipan/save', 'KutipanController::save'); // untuk menyimpan data
$routes->get('/kutipan/(:segment)', 'KutipanController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/kutipan/edit/(:segment)', 'KutipanController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/kutipan/edit_status/(:segment)/(:segment)', 'KutipanController::edit_status/$1/$2', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/kutipan/update', 'KutipanController::update'); // untuk mengupdate data
$routes->get('/kutipan/delete/(:segment)', 'KutipanController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/kutipan/search', 'KutipanController::search'); // untuk mencari data berdasarkan variable tertentu






// ROUTE LANDING PAGE
$routes->get('/welcome', 'welcome::index');


// ROUTE BERITA
$routes->get('/berita/listBerita', 'BeritaController::listBerita'); // untuk menampilkan data
$routes->get('/detailBeritaPengunjung/(:segment)', 'BeritaController::detail_berita_depan/$1'); // untuk menampilkan data
$routes->get('/detailBeritaPengunjung/(:segment)', 'BeritaController::detail_berita_depan/$1'); // untuk menampilkan data
$routes->get('/berita/detail', 'BeritaController::detail_berita_depan'); // untuk menampilkan data
$routes->get('/berita', 'BeritaController::display'); // untuk menampilkan data
$routes->get('/berita_master', 'BeritaController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/berita/add', 'BeritaController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/berita/save', 'BeritaController::save'); // untuk menyimpan data
$routes->get('/berita/(:segment)', 'BeritaController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/berita/edit/(:segment)', 'BeritaController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/berita/edit_status/(:segment)/(:segment)', 'BeritaController::edit_status/$1/$2', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/berita/update', 'BeritaController::update'); // untuk mengupdate data
$routes->get('/berita/delete/(:segment)', 'BeritaController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/berita/search', 'BeritaController::search'); // untuk mencari data berdasarkan variable tertentu

// ROUTE WAWASAN ISLAMI
$routes->get('/listWawasanIslami', 'WawasanIslamiController::listWawasan'); // untuk menampilkan data
$routes->get('/detailWawasanPengunjung/(:segment)', 'WawasanIslamiController::detail_wawasan_depan/$1'); // untuk menampilkan data
$routes->get('/detailWawasanPengunjung/(:segment)', 'WawasanIslamiController::detail_wawasan_depan/$1'); // untuk menampilkan data
$routes->get('/wawasan_islami', 'WawasanIslamiController::display'); // untuk menampilkan data
$routes->get('/wawasan_islami_master', 'WawasanIslamiController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/wawasan_islami/add', 'WawasanIslamiController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/wawasan_islami/save', 'WawasanIslamiController::save'); // untuk menyimpan data
$routes->get('/wawasan_islami/(:segment)', 'WawasanIslamiController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/wawasan_islami/edit/(:segment)', 'WawasanIslamiController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/wawasan_islami/edit_status/(:segment)/(:segment)', 'WawasanIslamiController::edit_status/$1/$2', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/wawasan_islami/update', 'WawasanIslamiController::update'); // untuk mengupdate data
$routes->get('/wawasan_islami/delete/(:segment)', 'WawasanIslamiController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/wawasan_islami/search', 'WawasanIslamiController::search'); // untuk mencari data berdasarkan variable tertentu



//ROUTE RENCANA KEGIATAN
$routes->get('/rencana_kegiatan', 'RencanaKegiatanController::display'); // untuk menampilkan data
$routes->get('/rencana_kegiatan_master', 'RencanaKegiatanController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/rencana_kegiatan/add', 'RencanaKegiatanController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/rencana_kegiatan/save', 'RencanaKegiatanController::save'); // untuk menyimpan data
$routes->get('/rencana_kegiatan/(:segment)', 'RencanaKegiatanController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/rencana_kegiatan/edit/(:segment)', 'RencanaKegiatanController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/rencana_kegiatan/edit_status/(:segment)/(:segment)', 'RencanaKegiatanController::edit_status/$1/$2', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/rencana_kegiatan/update', 'RencanaKegiatanController::update'); // untuk mengupdate data
$routes->get('/rencana_kegiatan/delete/(:segment)', 'RencanaKegiatanController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/rencana_kegiatan/search', 'RencanaKegiatanController::search'); // untuk mencari data berdasarkan variable tertentu





// ROUTE DASHBOARD
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']); // untuk menampilkan data

// ROUTE SARAN
$routes->get('/saran_master', 'saranController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->post('/saran/save', 'saranController::save'); // untuk menyimpan data
$routes->get('/saran/delete/(:segment)', 'saranController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil

// ROUTE SARAN
$routes->get('/jadwal_solat', 'JadwalSolatController::index'); // untuk menampilkan data

// ROUTE DASHBOARD
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']); // untuk menampilkan data


// ROUTE USER
$routes->get('/user', 'UserController::display'); // untuk menampilkan data
$routes->get('/user/ubah_password', 'UserController::ubah_password'); // untuk mencari data berdasarkan variable tertentu
$routes->get('/user_master', 'UserController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/user/add', 'UserController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/user/save', 'UserController::save'); // untuk menyimpan data
$routes->post('/user/save_password_baru', 'UserController::save_password_baru'); // untuk menyimpan data
$routes->get('/user/(:segment)', 'UserController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/user/edit/(:segment)', 'UserController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/user/edit_status/(:segment)/(:segment)', 'UserController::edit_status/$1/$2', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/user/update', 'UserController::update'); // untuk mengupdate data
$routes->get('/user/delete/(:segment)', 'UserController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/user/search', 'UserController::search'); // untuk mencari data berdasarkan variable tertentu
$routes->get('/user/email_activation/(:segment)/(:segment)', 'UserController::kirim_email/$1/$2'); // untuk menampilkan data
$routes->get('/aktivasi_akun/(:segment)', 'UserController::aktivasi_akun/$1'); // untuk menampilkan data
$routes->get('/lupa_password/', 'UserController::lupa_password/'); // untuk menampilkan data
$routes->post('/user/reset_password', 'UserController::reset_password'); // untuk mencari data berdasarkan variable tertentu
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
