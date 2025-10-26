<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriKlinis;

class KategoriKlinis_Controller extends Controller
{
    public function daftar_kategori_klinis() {
        $kategori_klinis_list = KategoriKlinis::all();
        return view('Admin.daftar-kategori-klinis', compact('kategori_klinis_list'));
    }
}

?>