<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    public function login() {

        return view('admin/login/login');
    }

    public function login_admin(Request $request) {

        $admin = Admin::where('email', '=', $request->email)->first();

        if ($admin) {

            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put('name', $admin->name);

                return redirect('admin/dashboard')->with('success', "Login Successfully");
            } else {
                return redirect('admin/login')->with('error', 'Incorrect Password');
            }
        } else {
            return redirect('admin/login')->with('error', 'Incorrect Email Or Password');
        }
    }

    public function logout(Request $request) {

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login')->with('success', "Logout Successfully");
    }

    public function dashboard() {

        $countrys = \App\Models\User::select('country')->whereNotNull('country')->distinct()->get();
        
        return view('admin/dashboard/dashboard', compact('countrys'));
    }

}
