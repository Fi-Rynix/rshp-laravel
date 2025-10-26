<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;

class Kategori_Controller extends Controller
{
    public function daftar_kategori() {
        $kategorilist = Kategori::all();
        return view('Admin.daftar-kategori', compact('kategorilist'));
    }
}

?>