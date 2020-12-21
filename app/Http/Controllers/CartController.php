<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

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
        return redirect()->route('cart.index');
    }

    public function update( Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->quantity;
        FacadesCart::update($rowId,$qty);
        return redirect()->route('cart.index');
    }

    public function delete($id)
    {
        if ($id == 'all') {
            FacadesCart::destroy();
            return redirect()->route('page.home');
        } else {
            FacadesCart::remove($id);
            return redirect()->route('cart.index');
        }
    }
}
