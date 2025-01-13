<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//login
$routes->get('/', 'UserController::index'); // Halaman login
$routes->post('/', 'UserController::login'); // Proses login

//lokasi
$routes->get('/lokasi', 'Home::halLokasi'); // Halaman beranda
$routes->get('/lokasi/halTambah', to: 'Home::halTambah'); // Menampilkan form tambah
$routes->post('/lokasi/tambah', 'Home::tambah'); // Proses tambah data
$routes->get('/lokasi/halEdit/(:any)', 'Home::halEdit/$1'); // Menampilkan form edit
$routes->post('/lokasi/update', 'Home::update'); // Proses update data
$routes->delete('/lokasi/hapus/(:any)', 'Home::hapusLokasi/$1'); //menghapus data

//pemakai
$routes->get('/pemakai/pemakai', 'PemakaiController::index');
$routes->get('/pemakai/halTambah', 'PemakaiController::haltambah');
$routes->post('/pemakai/tambah', 'PemakaiController::tambahPemakai');
$routes->get('/pemakai/edit/(:segment)', 'PemakaiController::halEdit/$1');
$routes->post('/pemakai/edit/(:segment)', 'PemakaiController::edit/$1');
$routes->post('/pemakai/hapus/(:segment)', 'PemakaiController::hapus/$1');

//Transaksi
$routes->get('/transaksi', 'TransaksiController::index');
$routes->get('/transaksi/create', 'TransaksiController::create');
$routes->post('/transaksi/store', 'TransaksiController::store');
$routes->get('/transaksi/edit/(:segment)', 'TransaksiController::edit/$1');
$routes->post('/transaksi/update/(:segment)', 'TransaksiController::update/$1');
$routes->delete('/transaksi/delete/(:segment)', 'TransaksiController::delete/$1'); // Ubah GET menjadi POST


// Routes untuk Alat
$routes->get('/alat/daftar', 'AlatController::halAlat');           // Tampilkan daftar alat
$routes->get('/alat/halTambah', 'AlatController::halTambah');     // Form tambah alat
$routes->post('/alat/tambah', 'AlatController::tambah');          // Proses tambah alat
$routes->get('/alat/edit/(:segment)', 'AlatController::halEdit/$1'); // Form edit alat berdasarkan ID
$routes->post('/alat/update', 'AlatController::update');          // Proses update alat
$routes->delete('/alat/hapus/(:segment)', 'AlatController::hapusAlat/$1'); // Proses hapus alat berdasarkan ID

// PETUGAS
$routes->get('/petugas', 'PetugasController::index');
$routes->get('/petugas/halTambah', 'PetugasController::halTambah');
$routes->post('/petugas/tambah', 'PetugasController::tambah');
$routes->get('/petugas/edit/(:segment)', 'PetugasController::edit/$1');
$routes->post('/petugas/update/(:segment)', 'PetugasController::update/$1');
$routes->post('/petugas/hapus/(:segment)', 'PetugasController::delete/$1');

// Vendor
$routes->get('/vendor/halVendor', 'VendorController::index');
$routes->get('/vendor/halTambah', 'VendorController::halTambah');
$routes->post('/vendor/tambah', 'VendorController::tambah');
$routes->get('/vendor/edit/(:segment)', 'VendorController::halEdit/$1');
$routes->post('/vendor/update', 'VendorController::update');
$routes->delete('vendor/hapus/(:segment)', 'VendorController::hapusVendor/$1');

