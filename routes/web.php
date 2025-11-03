<?php

use App\Http\Controllers\Admin\Dashboard_Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dokter\DashboardDokter_Controller;
use App\Http\Controllers\Pemilik\DashboardPemilik_Controller;
use App\Http\Controllers\Perawat\DashboardPerawat_Controller;
use App\Http\Controllers\Resepsionis\DashboardResepsionis_Controller;
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
Route::get('cek-koneksi', [MainSite_Controller::class, 'cek_koneksi' ])->name('cek-koneksi');

// Route::get('login', [MainSite_Controller::class,'login'])->name('login');


Auth::routes();

//admin
Route::middleware(['auth', 'IsAdmin'])->prefix('Admin')->name('Admin.')->group(function () {

Route::get('dashboard-admin', [Dashboard_Controller::class, 'dashboard_admin'])->name('dashboard-admin');
Route::get('data-master-admin', [AdminSite_Controller::class, 'data_master'])->name('data-master-admin');

Route::get('daftar-jenis-hewan', [JenisHewan_Controller::class, 'daftar_jenis_hewan' ])->name('daftar-jenis-hewan');
Route::get('JenisHewan/create-jenis-hewan', [JenisHewan_Controller::class, 'create_jenis_hewan'])->name('JenisHewan.create-jenis-hewan');
Route::post('JenisHewan/store-jenis-hewan', [JenisHewan_Controller::class, 'store_jenis_hewan'])->name('JenisHewan.store-jenis-hewan');

Route::get('daftar-kategori', [Kategori_Controller::class, 'daftar_kategori'])->name('daftar-kategori');
Route::get('daftar-kategori-klinis', [KategoriKlinis_Controller::class, 'daftar_kategori_klinis'])->name('daftar-kategori-klinis');
Route::get('daftar-manajemen-role', [Role_Controller::class, 'daftar_manajemen_role'])->name('daftar-manajemen-role');
Route::get('daftar-pemilik', [Pemilik_Controller::class, 'daftar_pemilik'])->name('daftar-pemilik');
Route::get('daftar-pet', [Pet_Controller::class, 'daftar_pet'])->name('daftar-pet');
Route::get('daftar-ras-hewan', [RasHewan_Controller::class, 'daftar_ras_hewan'])->name('daftar-ras-hewan');
Route::get('daftar-tindakan-terapi', [TindakanTerapi_Controller::class, 'daftar_tindakan_terapi'])->name('daftar-tindakan-terapi');
Route::get('daftar-user', [User_Controller::class, 'daftar_user'])->name('daftar-user');
});


//dokter
Route::middleware(['auth', 'IsDokter'])->group(function () {
    Route::get('dashboard-dokter', [DashboardDokter_Controller::class, 'dashboard_dokter'])->name('dashboard-dokter');
});


//perawat
Route::middleware(['auth', 'IsPerawat'])->group(function () {
    Route::get('dashboard-perawat', [DashboardPerawat_Controller::class, 'dashboard_perawat'])->name('dashboard-perawat');
});


//resepsionis
Route::middleware(['auth', 'IsResepsionis'])->group(function () {
    Route::get('dashboard-resepsionis', [DashboardResepsionis_Controller::class, 'dashboard_resepsionis'])->name('dashboard-resepsionis');
});


//pemilik
Route::middleware(['auth','IsPemilik'])->group(function () {
    Route::get('dashboard-pemilik', [DashboardPemilik_Controller::class, 'dashboard_pemilik'])->name('dashboard-pemilik');
});


//logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
