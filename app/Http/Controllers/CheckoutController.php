<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bill;
use App\Order;
use App\OrderDetail;
use App\Slider;
use App\Brand;
use App\Category;
use App\Ship;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;

class CheckoutController extends Controller
{
    public function show()
    {
        $total = FacadesCart::total();
        $carts = FacadesCart::content();
        $ships = Ship::get();
        return view('frontend.checkout.show', compact('carts', 'total', 'ships'));
    }

    public function info()
    {
        $id = Auth::user()->id;
        $bills = Bill::where('user_id', $id)->latest()->take(1)->get();
        $total = FacadesCart::total();
        $carts = FacadesCart::content();
        return view('frontend.checkout.info', compact('carts', 'total', 'bills'));
    }

    public function add(Request $request)
    {
        Bill::create([
            'user_id' => Auth::user()->id,
            'ship_id' => $request->ship_id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'note' => $request->note,
        ]);
        Toastr::success('Thông tin giao hàng đã được lưu', 'THANH TOÁN', ["positionClass" => "toast-top-center"]);
        return redirect()->route('checkout.info');
    }

    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
        $bill->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'note' => $request->note,
        ]);
        Toastr::warning('Thông tin gia hàng đã được cập nhật', 'THANH TOÁN', ["positionClass" => "toast-top-center"]);
        return redirect()->route('checkout.info');
    }

    public function order($id)
    {
        $content = FacadesCart::content();
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'bill_id' => $id,
            'order_total' => FacadesCart::total(),
            'order_status' => 'chờ xác nhận',
        ]);
        foreach ($content as $v_content) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $v_content->id,
                'product_name' => $v_content->name,
                'product_price' => $v_content->price,
                'product_qty' => $v_content->qty,
            ]);
        }
        Toastr::success('Thanh toán thành công', 'THANH TOÁN', ["positionClass" => "toast-top-center"]);
        return redirect()->route('checkout.mail');
    }

    public function mail()
    {
        $id = Auth::user()->id;
        $bill = Bill::where('user_id', $id)->latest()->first();
        $cart = FacadesCart::content();
        Mail::to($bill->email)->send(new \App\Mail\MyTestMail($cart, $bill));
        return redirect()->route('checkout.thank');
    }

    public function thank()
    {
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::get();
        $sliders = Slider::latest()->get();
        FacadesCart::destroy();
        Toastr::success('Cảm ơn bạn đã chọn chúng tôi', 'CẢM ƠN', ["positionClass" => "toast-top-center"]);
        return view('errors.thank', compact('sliders', 'categories', 'brands',));
    }
}
