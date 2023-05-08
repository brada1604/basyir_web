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

// ROUTE MAHASISWA
$routes->get('/mahasiswa', 'MahasiswaController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/mahasiswa/export_pdf', 'MahasiswaController::export_pdf'); // untuk menyimpan data
$routes->get('/mahasiswa/clear', 'MahasiswaController::clear');
$routes->get('/mahasiswa/add', 'MahasiswaController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/mahasiswa/save', 'MahasiswaController::save'); // untuk menyimpan data
$routes->get('/mahasiswa/(:segment)', 'MahasiswaController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/mahasiswa/edit/(:segment)', 'MahasiswaController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/mahasiswa/update', 'MahasiswaController::update'); // untuk mengupdate data
$routes->get('/mahasiswa/delete/(:segment)', 'MahasiswaController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/mahasiswa/search', 'MahasiswaController::search'); // untuk mencari data mahasiswa berdasarkan nama


$routes->post('/mahasiswa/import_excel', 'MahasiswaController::import_excel'); // untuk menyimpan data



// ROUTE PEGAWAI
$routes->get('/pegawai', 'PegawaiController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/pegawai/add', 'PegawaiController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/pegawai/save', 'PegawaiController::save'); // untuk menyimpan data
$routes->get('/pegawai/(:segment)', 'PegawaiController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/pegawai/edit/(:segment)', 'PegawaiController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/pegawai/update', 'PegawaiController::update'); // untuk mengupdate data
$routes->get('/pegawai/delete/(:segment)', 'PegawaiController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/pegawai/search', 'PegawaiController::search'); // untuk mencari data pegawai berdasarkan nama

// ROUTE BARANG
$routes->get('/barang', 'BarangController::display'); // untuk menampilkan data

// ROUTE SOUVENIR
$routes->get('/souvenir', 'SouvenirController::display'); // untuk menampilkan data
$routes->get('/souvenir_master', 'SouvenirController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/souvenir/add', 'SouvenirController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/souvenir/save', 'SouvenirController::save'); // untuk menyimpan data
$routes->get('/souvenir/(:segment)', 'SouvenirController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/souvenir/edit/(:segment)', 'SouvenirController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/souvenir/update', 'SouvenirController::update'); // untuk mengupdate data
$routes->get('/souvenir/delete/(:segment)', 'SouvenirController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/souvenir/search', 'SouvenirController::search'); // untuk mencari data berdasarkan variable tertentu

// ROUTE CART
$routes->get('/cart/add/(:segment)/(:segment)', 'CartController::add/$1/$2'); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/cart/update', 'CartController::update');
$routes->get('/cart/remove/(:segment)', 'CartController::remove/$1'); // (:segment) = parameter, $1 = parameter pertama yang di ambil

// ROUTE CART SOUVENIR
$routes->get('/cart_souvenir', 'CartSouvenirController::index');
$routes->get('/cart_souvenir/clear', 'CartSouvenirController::clear');
$routes->get('/cart_souvenir/add/(:segment)/(:segment)', 'CartSouvenirController::add/$1/$2'); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/cart_souvenir/update', 'CartSouvenirController::update');
$routes->get('/cart_souvenir/remove/(:segment)', 'CartSouvenirController::remove/$1'); // (:segment) = parameter, $1 = parameter pertama yang di ambil

// ROUTE TRANSAKSI
$routes->get('/checkout', 'TransaksiController::index'); // untuk menampilkan data
$routes->post('/checkout/save', 'TransaksiController::save'); // untuk menampilkan data

// ROUTE TRANSAKSI SOUVENIR
$routes->get('/checkout_souvenir', 'TransaksiSouvenirController::index'); // untuk menampilkan data
$routes->post('/checkout_souvenir/save', 'TransaksiSouvenirController::save'); // untuk menampilkan data

// ROUTE HOME / BERANDA
$routes->get('/home', 'HomeController::index', ['filter' => 'auth']); // untuk menampilkan data

// ROUTE INFO
$routes->get('/info', 'InfoController::index', ['filter' => 'auth']); // untuk menampilkan data


// ROUTE AUTH
$routes->get('/login', 'AuthController::index'); // untuk login
$routes->get('/logout', 'AuthController::logout'); // untuk logout
$routes->post('/login/auth', 'AuthController::auth'); // untuk checking data login
$routes->get('/register', 'RegisterController::index'); // untuk register data
$routes->post('/register/save', 'RegisterController::save'); // untuk menyimpan user baru

// ROUTE LANDING PAGE
$routes->get('/welcome', 'welcome::index');


// ROUTE BERITA
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

//ROUTE KUTIPAN ISLAMI
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

//ROUTE RENCANA KEGIATAN
$routes->get('/rencana_kegiatan', 'RencanaKegiatanController::display'); // untuk menampilkan data
$routes->get('/rencana_kegiatan_master', 'RencanaKegiatanController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/rencana_kegiatan/add', 'RencanaKegiatanController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/rencana_kegiatan/save', 'RencanaKegiatanController::save'); // untuk menyimpan data
$routes->get('/rencana_kegiatan/(:segment)', 'RencanaKegiatanController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/rencana_kegiatan/edit/(:segment)', 'RencanaKegiatanController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/rencana_kegiatan/update', 'RencanaKegiatanController::update'); // untuk mengupdate data
$routes->get('/rencana_kegiatan/delete/(:segment)', 'RencanaKegiatanController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/rencana_kegiatan/search', 'RencanaKegiatanController::search'); // untuk mencari data berdasarkan variable tertentu

// ROUTE AMALAN YAUMI
$routes->get('/amalan_yaumi', 'AmalanYaumiController::display'); // untuk menampilkan data
$routes->get('/amalan_yaumi_master', 'AmalanYaumiController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/amalan_yaumi/add', 'AmalanYaumiController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/amalan_yaumi/save', 'AmalanYaumiController::save'); // untuk menyimpan data
$routes->get('/amalan_yaumi/(:segment)', 'AmalanYaumiController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/amalan_yaumi/edit/(:segment)', 'AmalanYaumiController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/amalan_yaumi/update', 'AmalanYaumiController::update'); // untuk mengupdate data
$routes->get('/amalan_yaumi/delete/(:segment)', 'AmalanYaumiController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/amalan_yaumi/search', 'AmalanYaumiController::search'); // untuk mencari data berdasarkan variable tertentu

// ROUTE DOA
$routes->get('/doa', 'DoaController::display'); // untuk menampilkan data
$routes->get('/doa_master', 'DoaController::index', ['filter' => 'auth']); // untuk menampilkan data
$routes->get('/doa/add', 'DoaController::add', ['filter' => 'auth']); // untuk menambahkan data
$routes->post('/doa/save', 'DoaController::save'); // untuk menyimpan data
$routes->get('/doa/(:segment)', 'DoaController::detail/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/doa/edit/(:segment)', 'DoaController::edit/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/doa/update', 'DoaController::update'); // untuk mengupdate data
$routes->get('/doa/delete/(:segment)', 'DoaController::delete/$1', ['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/doa/search', 'DoaController::search'); // untuk mencari data berdasarkan variable tertentu

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
