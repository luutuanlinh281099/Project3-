<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Product;
use App\User;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\DB;

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
            Toastr::info('Đăng nhập thành công', 'ĐĂNG NHẬP', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.home');
        } else {
            Toastr::error('Đăng nhập thất bại', 'ĐĂNG NHẬP', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.login');
        }
    }

    //  đăng xuất admin
    public function logout()
    {
        Auth::logout();
        Toastr::info('Đăng xuất thành công', 'ĐĂNG XUẤT', ["positionClass" => "toast-top-center"]);
        return view('backend.login');
    }

    //  trang quản lí
    public function adminhome()
    {
        $product = Product::count();
        $customer = User::count();
        $order = Order::count();
        $momney = OrderDetail::sum('product_price');
        return view('backend.home', compact('product', 'customer', 'order', 'momney'));
    }

    public function search(Request $request)
    {
        $from = $request->datefrom;
        $to = $request->dateto;
        $product = Product::whereBetween('created_at', [$from, $to])->count();
        $customer = User::whereBetween('created_at', [$from, $to])->count();
        $order = Order::whereBetween('created_at', [$from, $to])->count();
        $momney = OrderDetail::whereBetween('created_at', [$from, $to])->sum('product_price');
        return view('backend.home', compact('product', 'customer', 'order', 'momney'));
    }
}
