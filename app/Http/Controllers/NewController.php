<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newpaper;
use App\Brand;
use App\Slider;
use App\Category;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    public function all()
    {
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::get();
        $sliders = Slider::latest()->get();
        $news = Newpaper::latest()->get();
        return view('frontend.new.all', compact('news','sliders', 'categories', 'brands'));
    }

    public function detail($id)
    {
        $newDetails = Newpaper::where('id', $id)->get();
        $brands = Brand::get();
        $categories = Category::where('parent_id', 0)->get();
        Newpaper::where('id', $id)->increment('view', 1);
        return view('frontend.new.detail', compact('categories', 'brands', 'newDetails'));
    }
}
