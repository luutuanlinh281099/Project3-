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
        // gủi mail
        $data['info'] = $request->all();
        $data['cart'] = FacadesCart::content();
        $email = $request->email;
        Mail::send('errors.email', $data, function($message) use ($email){
            $message->from('tuanlinh99lfc@gmail.com', 'Tuấn Linh');
            $message->to($email, $email);
            $message->cc('tuanlinh99lfc@gmail.com', 'Tuấn Linh');
            $message->subject('Xác nhận hóa đơn');
        });
        FacadesCart::destroy();
        return redirect()->route('checkout.thank');
    }

    public function thank()
    {
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::get();
        $sliders = Slider::latest()->get();
        return view('errors.thank', compact('sliders', 'categories', 'brands',));
    }
}
