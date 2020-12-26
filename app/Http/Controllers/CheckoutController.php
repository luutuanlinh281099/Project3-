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
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;

class CheckoutController extends Controller
{
    public function show()
    {
        $total = FacadesCart::total();
        $carts = FacadesCart::content();
        return view('frontend.checkout.show', compact('carts', 'total'));
    }

    public function add(Request $request)
    {
        $content = FacadesCart::content();
        $bill = Bill::create([
            'user_id'=> Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'note' => $request->note,
        ]);
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'bill_id' => $bill->id,
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
        $data['cart'] = FacadesCart::content();
        $to_name = 'Tuấn Linh';
        $to_email = 'sutlavao99l@gmail.com';
        Mail::send('errors.mail', $data['cart'],function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('test mail nhé');
            $message->from($to_email,$to_name);
        });
        return redirect()->route('checkout.thank');
    }

    public function thank()
    {
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::get();
        $sliders = Slider::latest()->get();
        FacadesCart::destroy();
        return view('errors.thank', compact('sliders', 'categories', 'brands',));
    }
}
