<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('backend.admin.admin_dashboard');
    }

    /* Manage Roles functions */

    public function manageRoles() {

        $viewRoles = Admin::whereNotIn('type', ['Superadmin'])->get();
        return view('backend.admin.admins.index' , compact('viewRoles'));
    }
}
