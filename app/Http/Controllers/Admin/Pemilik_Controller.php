<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemilik;

class Pemilik_Controller extends Controller
{
    public function daftar_pemilik() {
        $pemiliklist = Pemilik::all();
        return view('Admin.daftar-pemilik', compact('pemiliklist'));
    }
}

?>