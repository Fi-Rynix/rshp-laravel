<?php

use App\Http\Controllers\MainSite_Controller;
use App\Http\Controllers\Admin\AdminSite_Controller;
use App\Http\Controllers\Admin\JenisHewan_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\JenisHewan;


Route::get('/', function () {
    return view('welcome');
});


//halaman utama
Route::get('rshp', [MainSite_Controller::class,'rshp'])->name('rshp');

Route::get('struktur-organisasi', [MainSite_Controller::class,'struktur_organisasi'])->name('struktur-organisasi');

Route::get('layanan-umum', [MainSite_Controller::class,'layanan_umum'])->name('layanan-umum');

Route::get('login', [MainSite_Controller::class,'login'])->name('login');

Route::get('cek-koneksi', [MainSite_Controller::class, 'cek_koneksi' ])->name('cek-koneksi');


//admin
Route::get('data-master-admin', [AdminSite_Controller::class, 'data_master'])->name('data-master-admin');

Route::get('daftar-jenis-hewan', [JenisHewan_Controller::class, 'daftar_jenis_hewan' ])->name('daftar-jenis-hewan');

