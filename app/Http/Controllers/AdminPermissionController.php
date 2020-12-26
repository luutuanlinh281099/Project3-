<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AdminPermissionController extends Controller
{
    public function create()
    {
        return view('backend.admin.permission.add');
    }

    public function store(Request $request)
    {
        Permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'key_code' => $request->key_code,
        ]);
        Toastr::success('Thêm mới thành công', 'PHÂN QUYỀN', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.home');
    }
}
