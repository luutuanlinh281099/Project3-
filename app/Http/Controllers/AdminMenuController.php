<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
class AdminMenuController extends Controller
{

    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    public function index()
    {
        $menus = $this->menu->paginate(10);
        return view('backend.admin.menu.index', compact('menus'));
    }

    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('backend.admin.menu.add', compact('optionSelect'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::slug($request->name)
        ]);
        Toastr::success('Thêm mới thành công', 'MENU', ["positionClass" => "toast-top-center"]);
        return redirect()->route('menu.index');
    }

    public function edit($id, Request $request)
    {
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuFollowIdEdit->parent_id);
        return view('backend.admin.menu.edit', compact('optionSelect', 'menuFollowIdEdit'));
    }

    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::slug($request->name)
        ]);
        Toastr::warning('Cập nhật thành công', 'MENU', ["positionClass" => "toast-top-center"]);
        return redirect()->route('menu.index');
    }

    public function delete($id)
    {
        $this->menu->find($id)->delete();
        Toastr::error('Xóa thành công', 'MENU', ["positionClass" => "toast-top-center"]);
        return redirect()->route('menu.index');
    }
}
