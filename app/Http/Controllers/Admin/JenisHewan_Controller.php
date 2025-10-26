<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisHewan;

class JenisHewan_Controller extends Controller
{
    public function daftar_jenis_hewan() {
        $hewanlist = JenisHewan::all();
        return view('Admin.daftar-jenis-hewan', compact('hewanlist'));
    }
}
