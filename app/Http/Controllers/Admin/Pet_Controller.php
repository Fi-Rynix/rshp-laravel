<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pet;

class Pet_Controller extends Controller
{
    public function daftar_pet() {
        $petlist = Pet::with(['pemilik.user', 'rasHewan'])->get();
        return view('Admin.daftar-pet', compact('petlist'));
    }
}

?>