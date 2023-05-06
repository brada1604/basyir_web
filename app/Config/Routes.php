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

// ROUTE MAHASISWA
$routes->get('/mahasiswa', 'MahasiswaController::index',['filter' => 'auth']); // untuk menampilkan data
$routes->get('/mahasiswa/export_pdf', 'MahasiswaController::export_pdf'); // untuk menyimpan data
$routes->get('/mahasiswa/clear', 'MahasiswaController::clear');
$routes->get('/mahasiswa/add', 'MahasiswaController::add',['filter' => 'auth']); // untuk menambahkan data
$routes->post('/mahasiswa/save', 'MahasiswaController::save'); // untuk menyimpan data
$routes->get('/mahasiswa/(:segment)', 'MahasiswaController::detail/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/mahasiswa/edit/(:segment)', 'MahasiswaController::edit/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/mahasiswa/update', 'MahasiswaController::update'); // untuk mengupdate data
$routes->get('/mahasiswa/delete/(:segment)', 'MahasiswaController::delete/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/mahasiswa/search', 'MahasiswaController::search'); // untuk mencari data mahasiswa berdasarkan nama


$routes->post('/mahasiswa/import_excel', 'MahasiswaController::import_excel'); // untuk menyimpan data



// ROUTE PEGAWAI
$routes->get('/pegawai', 'PegawaiController::index',['filter' => 'auth']); // untuk menampilkan data
$routes->get('/pegawai/add', 'PegawaiController::add',['filter' => 'auth']); // untuk menambahkan data
$routes->post('/pegawai/save', 'PegawaiController::save'); // untuk menyimpan data
$routes->get('/pegawai/(:segment)', 'PegawaiController::detail/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/pegawai/edit/(:segment)', 'PegawaiController::edit/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/pegawai/update', 'PegawaiController::update'); // untuk mengupdate data
$routes->get('/pegawai/delete/(:segment)', 'PegawaiController::delete/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/pegawai/search', 'PegawaiController::search'); // untuk mencari data pegawai berdasarkan nama

// ROUTE BARANG
$routes->get('/barang', 'BarangController::display'); // untuk menampilkan data

// ROUTE SOUVENIR
$routes->get('/souvenir', 'SouvenirController::display'); // untuk menampilkan data
$routes->get('/souvenir_master', 'SouvenirController::index',['filter' => 'auth']); // untuk menampilkan data
$routes->get('/souvenir/add', 'SouvenirController::add',['filter' => 'auth']); // untuk menambahkan data
$routes->post('/souvenir/save', 'SouvenirController::save'); // untuk menyimpan data
$routes->get('/souvenir/(:segment)', 'SouvenirController::detail/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/souvenir/edit/(:segment)', 'SouvenirController::edit/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/souvenir/update', 'SouvenirController::update'); // untuk mengupdate data
$routes->get('/souvenir/delete/(:segment)', 'SouvenirController::delete/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
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
$routes->get('/home', 'HomeController::index',['filter' => 'auth']); // untuk menampilkan data

// ROUTE INFO
$routes->get('/info', 'InfoController::index',['filter' => 'auth']); // untuk menampilkan data


// ROUTE AUTH
$routes->get('/login', 'AuthController::index'); // untuk login
$routes->get('/logout', 'AuthController::logout'); // untuk logout
$routes->post('/login/auth', 'AuthController::auth'); // untuk checking data login
$routes->get('/register', 'RegisterController::index'); // untuk register data
$routes->post('/register/save', 'RegisterController::save'); // untuk menyimpan user baru


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
