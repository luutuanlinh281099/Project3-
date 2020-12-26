<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Brand;
use App\Category;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Brian2694\Toastr\Facades\Toastr;

session_start();
class CustomerController extends Controller
{
    // đăng nhập
    public function getLoginCustomer()
    {
        return view('frontend.login');
    }

    public function postLoginCustomer(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            Toastr::info('Đăng nhập thành công', 'ĐĂNG NHẬP', ["positionClass" => "toast-top-center"]);
            return redirect()->route('page.home');
        } else {
            Toastr::error('Đăng nhập thất bại', 'ĐĂNG NHẬP', ["positionClass" => "toast-top-center"]);
            return redirect()->route('customer.login');
        }
    }

    //  đăng xuất 
    public function logout()
    {
        Auth::logout();
        FacadesCart::destroy();
        Toastr::info('Đăng xuất thành công', 'ĐĂNG XUẤT', ["positionClass" => "toast-top-center"]);
        return redirect()->route('page.home');
    }
    //  đăng kí
    public function add(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        DB::table('role_user')->insert([
            'user_id' => $user->id,
            'role_id' => $request->role_id,
        ]);
        Toastr::success('Đăng kí thành công', 'THÀNH VIÊN', ["positionClass" => "toast-top-center"]);
        return redirect()->route('customer.login');
    }

    public function show($id)
    {
        $orders = Order::where('user_id' , $id)->get();
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::get();
        $user = User::where('id', $id)->get();
        return view('frontend.customer.show', compact('user', 'categories', 'brands', 'orders'));
    }

    public function edit($id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::get();
        return view('frontend.customer.edit', compact('categories', 'brands'));
    }

    public function update($id, Request $request)
    {
        User::find($id)->update([
            'password' => Hash::make($request->password)
        ]);
        Toastr::warning('Đổi mật khẩu thành công', 'THÀNH VIÊN', ["positionClass" => "toast-top-center"]);
        return redirect()->route('customer.show' , ['id' => Auth::user()->id]);
    }

    public function detail($id)
    {
        $orders = Order::find($id);
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::get();
        $user = User::where('id', $id)->get();
        $orderDetails = $orders->orderDetail;
        return view('frontend.customer.detail', compact('orders' ,'orderDetails', 'user', 'categories', 'brands'));
    }
}
