<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class User_Controller extends Controller
{
    public function daftar_user() {
        $userlist = User::all();
        return view('Admin.daftar-user', compact('userlist'));
    }
}

?>