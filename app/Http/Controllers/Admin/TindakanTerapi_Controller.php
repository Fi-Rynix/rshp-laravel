<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KodeTindakanTerapi;

class TindakanTerapi_Controller extends Controller
{
    public function daftar_tindakan_terapi() {
        $tindakanterapilist = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
        return view('Admin.daftar-tindakan-terapi', compact('tindakanterapilist'));
    }
}

?>