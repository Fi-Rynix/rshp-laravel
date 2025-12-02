<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dokter;

class Dokter_Controller extends Controller
{
    public function daftar_pemilik() {
        $pemiliklist = Pemilik::all();
        return view('Admin.daftar-pemilik', compact('pemiliklist'));
    }
}

?>