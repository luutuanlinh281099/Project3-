<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class AdminCategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->paginate(10);
        return view('backend.admin.category.index', compact('categories'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('backend.admin.category.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::slug($request->name)
        ]);
        Toastr::success('Thêm mới thành công', 'DANH MỤC', ["positionClass" => "toast-top-center"]);
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('backend.admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::slug($request->name)
        ]);
        Toastr::warning('Cập nhật thành công', 'DANH MỤC', ["positionClass" => "toast-top-center"]);
        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        Toastr::error('Xóa thành công', 'DANH MỤC', ["positionClass" => "toast-top-center"]);
        return redirect()->route('category.index');
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
}
