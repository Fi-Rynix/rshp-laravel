<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisHewan;

class JenisHewan_Controller extends Controller
{
    public function daftar_jenis_hewan() {
        $hewanlist = JenisHewan::all();
        return view('Admin.JenisHewan.daftar-jenis-hewan', compact('hewanlist'));
    }

    public function create_jenis_hewan() {
        return view('Admin.JenisHewan.create-jenis-hewan');
    }

    public function store_jenis_hewan(Request $request) {
        $validate_data = $this->ValidateJenisHewan($request);
        $jenis_hewan = $this->CreateJenisHewan($validate_data);
        return redirect()->route('Admin.JenisHewan.daftar-jenis-hewan')->with('success', 'Jenis hewan berhasil ditambahkan.');
    }
}

?>