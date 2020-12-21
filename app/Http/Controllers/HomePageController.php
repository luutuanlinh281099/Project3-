<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Brand;
use App\Category;
use App\Product;

class HomePageController extends Controller
{
    public function index()
    {
        $categoryTab = Category::get();
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::get();
        $sliders = Slider::latest()->get();
        $products = Product::latest()->take(6)->get();
        $productRecomments = Product::orderBy('view', 'desc')->take(6)->get();
        return view('frontend.home.home', compact('sliders', 'categories', 'brands', 'products', 'categoryTab', 'productRecomments'));
    }
    
    public function search(Request $request)
    {
        $brands = Brand::get();
        $categories = Category::where('parent_id', 0)->get();
        $keywords = $request->key;
        $productSearch = Product::where('name', 'like', '%'.$keywords.'%') ->get();
        return view('frontend.product.search', compact('productSearch','categories','brands'));
    }
}
