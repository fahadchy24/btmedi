<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('backend.admin_dashboard');
    }

    /* Manage Roles functions */

    public function manageRoles() {

        $viewRoles = Admin::whereNotIn('type', ['Superadmin'])->get();
        return view('backend.admins.index' , compact('viewRoles'));
    }
}
