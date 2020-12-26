<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function product($slug, $id)
    {
        $brands = Brand::get();
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::where('category_id', $id)->paginate(6);
        Toastr::success('Tất cả sản phẩm', 'DANH MỤC', ["positionClass" => "toast-top-center"]);
        return view('frontend.product.category.list', compact('categories', 'products','brands'));
    }
}
