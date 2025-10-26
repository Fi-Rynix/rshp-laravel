<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisHewan;

class RasHewan_Controller extends Controller
{
    public function daftar_ras_hewan() {
        // ambil jenis hewan beserta relasi rasHewan
        $hewanRasList = JenisHewan::with('rasHewan')->get();
        return view('Admin.daftar-ras-hewan', compact('hewanRasList'));
    }
}

?>