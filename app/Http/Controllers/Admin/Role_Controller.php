<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class Role_Controller extends Controller
{
    public function daftar_manajemen_role() {
        $rolelist = User::with('roles')->get();
        return view('Admin.daftar-manajemen-role', compact('rolelist'));
    }
}

?>