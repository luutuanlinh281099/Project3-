<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

session_start();
class AdminController extends Controller
{
    //  đăng nhập admin
    public function getLoginAdmin()
    {
        return view('backend.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login');
        }
    }

    //  đăng xuất admin
    public function logout()
    {
        Auth::logout();
        return view('backend.login');
    }

    //  trang quản lí
    public function adminhome()
    {
        return view('backend.home');
    }
}
