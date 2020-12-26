<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\ProductImage;
use App\Brand;
use App\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($id)
    {
        $brands = Brand::get();
        $categoryProduct = Product::find($id)->category;
        $imageProduct = ProductImage::where('product_id', $id);
        $categories = Category::where('parent_id', 0)->get();
        $categoryTab = Category::latest()->get();
        $productDetail = Product::where('id', $id)->get();
        DB::table('products')->where('id', $id)->increment('view', 1);
        return view('frontend.product.detail', compact('categories', 'categoryTab', 'productDetail',
                                                        'imageProduct','categoryProduct','brands'));
    }

    public function allProduct()
    {
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::get();
        $sliders = Slider::latest()->get();
        $products = Product::latest()->get();
        return view('frontend.product.all', compact('products','sliders', 'categories', 'brands'));
    }
}
