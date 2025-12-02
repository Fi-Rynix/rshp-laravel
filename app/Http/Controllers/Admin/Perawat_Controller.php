<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Perawat;

class Perawat_Controller extends Controller
{
    public function daftar_perawat() {
        $pemiliklist = Perawat::all();
        return view('Admin.Perawat.daftar-perawat', compact('perawatlist'));
    }
}

?>