<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\ProductImage;
use App\Brand;

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
        return view('frontend.product.detail', compact('categories', 'categoryTab', 'productDetail','imageProduct','categoryProduct','brands'));
    }

}
