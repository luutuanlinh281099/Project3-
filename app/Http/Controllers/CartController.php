<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Brian2694\Toastr\Facades\Toastr;

class CartController extends Controller
{
    
    public function index()
    {
        $total = FacadesCart::total();
        $carts = FacadesCart::content();
        return view('frontend.cart.index', compact('carts', 'total'));
    }

    public function add($id)
    {
        $product = Product::find($id);
        FacadesCart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 550,
            'options' => ['img' => $product->feature_image_path]
        ]);
        Toastr::success('Thêm thành công', 'GIỎ HÀNG', ["positionClass" => "toast-top-center"]);
        return redirect()->route('cart.index');
    }

    public function update( Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->quantity;
        FacadesCart::update($rowId,$qty);
        Toastr::warning('Cập nhật thành công', 'GIỎ HÀNG', ["positionClass" => "toast-top-center"]);
        return redirect()->route('cart.index');
    }

    public function delete($id)
    {
        if ($id == 'all') {
            FacadesCart::destroy();
            Toastr::error('Xóa toàn bộ giỏ hàng', 'GIỎ HÀNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('page.home');
        } else {
            FacadesCart::remove($id);
            Toastr::error('Xóa thành công', 'GIỎ HÀNG', ["positionClass" => "toast-top-center"]);
            return redirect()->route('cart.index');
        }
    }
}
