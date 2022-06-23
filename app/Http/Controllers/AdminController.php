<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $data = $request->validate([
            'admin_email' => 'required',
            'admin_password' => 'required'
        ]);
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if ($result) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin');
        }
    }
}
