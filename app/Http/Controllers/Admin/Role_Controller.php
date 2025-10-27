<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class Role_Controller extends Controller
{
    public function daftar_manajemen_role() {
        // ambil semua user yang punya role_user status=1 dan eager-load roleUsers -> role
        $roleuserlist = User::whereHas('roleUsers', function($q){
            $q->where('status', 1);
        })->with('roleUsers.role')->get();

        return view('Admin.daftar-manajemen-role', compact('roleuserlist'));
    }
}

?>