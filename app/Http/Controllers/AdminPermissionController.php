<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

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
        return redirect()->route('admin.home');
    }
}
