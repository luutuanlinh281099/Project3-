<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class AdminBrandController extends Controller
{
    private $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function index()
    {
        $brands = $this->brand->paginate(10);
        return view('backend.admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('backend.admin.brand.add');
    }

    public function store(Request $request)
    {
        $this->brand->create([
            'name' => $request->name,
            'slug' => str::slug($request->name),
        ]);
        return redirect()->route('brand.index');
    }

    public function edit($id)
    {
        $brand = $this->brand->find($id);
        return view('backend.admin.brand.edit', compact('brand'));
    }

    public function update($id, Request $request)
    {
        $this->brand->find($id)->update([
            'name' => $request->name,
            'slug' => str::slug($request->name)
        ]);
        return redirect()->route('brand.index');
    }

    public function delete($id)
    {
        $this->brand->find($id)->delete();
        return redirect()->route('brand.index');
    }
}
