<?php

use Illuminate\Support\Facades\Route;

//halaman utama
use App\Http\Controllers\MainSite_Controller;

//admin
use App\Http\Controllers\Admin\AdminSite_Controller;
use App\Http\Controllers\Admin\JenisHewan_Controller;
use App\Http\Controllers\Admin\Kategori_Controller;
use App\Http\Controllers\Admin\KategoriKlinis_Controller;
use App\Http\Controllers\Admin\Role_Controller;
use App\Http\Controllers\Admin\Pemilik_Controller;
use App\Http\Controllers\Admin\Pet_Controller;
use App\Http\Controllers\Admin\RasHewan_Controller;
use App\Http\Controllers\Admin\TindakanTerapi_Controller;
use App\Http\Controllers\Admin\User_Controller;


Route::get('/', function () {
    return view('welcome');
});


//halaman utama
Route::get('rshp', [MainSite_Controller::class,'rshp'])->name('rshp');

Route::get('struktur-organisasi', [MainSite_Controller::class,'struktur_organisasi'])->name('struktur-organisasi');

Route::get('layanan-umum', [MainSite_Controller::class,'layanan_umum'])->name('layanan-umum');

// Route::get('login', [MainSite_Controller::class,'login'])->name('login');

Route::get('cek-koneksi', [MainSite_Controller::class, 'cek_koneksi' ])->name('cek-koneksi');


//admin
Route::get('data-master-admin', [AdminSite_Controller::class, 'data_master'])->name('data-master-admin');

Route::get('daftar-jenis-hewan', [JenisHewan_Controller::class, 'daftar_jenis_hewan' ])->name('daftar-jenis-hewan');

Route::get('daftar-kategori', [Kategori_Controller::class, 'daftar_kategori'])->name('daftar-kategori');

Route::get('daftar-kategori-klinis', [KategoriKlinis_Controller::class, 'daftar_kategori_klinis'])->name('daftar-kategori-klinis');

Route::get('daftar-manajemen-role', [Role_Controller::class, 'daftar_manajemen_role'])->name('daftar-manajemen-role');

Route::get('daftar-pemilik', [Pemilik_Controller::class, 'daftar_pemilik'])->name('daftar-pemilik');

Route::get('daftar-pet', [Pet_Controller::class, 'daftar_pet'])->name('daftar-pet');

Route::get('daftar-ras-hewan', [RasHewan_Controller::class, 'daftar_ras_hewan'])->name('daftar-ras-hewan');

Route::get('daftar-tindakan-terapi', [TindakanTerapi_Controller::class, 'daftar_tindakan_terapi'])->name('daftar-tindakan-terapi');

Route::get('daftar-user', [User_Controller::class, 'daftar_user'])->name('daftar-user');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
