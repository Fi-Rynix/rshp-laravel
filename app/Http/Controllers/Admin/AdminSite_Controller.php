<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSite_Controller extends Controller
{
    public function data_master() {
        view('Admin.data-master-admin');
    }
}
