<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->paginate(10);
        return view('backend.admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissionsParent = $this->permission->get();
        return view('backend.admin.role.add', compact('permissionsParent'));
    }

    public function store(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $role->permissions()->attach($request->permission_id);
        Toastr::success('Thêm mới thành công', 'VAI TRÒ', ["positionClass" => "toast-top-center"]);
        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $permissionsParent = $this->permission->get();
        $role = $this->role->find($id);
        $permissionsChecked = $role->permissions;
        return view('backend.admin.role.edit', compact('permissionsParent', 'role', 'permissionsChecked'));
    }

    public function update(Request $request, $id)
    {
        $role = $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $role->permissions()->sync($request->permission_id);
        Toastr::warning('Cập nhật thành công', 'VAI TRÒ', ["positionClass" => "toast-top-center"]);
        return redirect()->route('role.index');
    }

    public function delete($id)
    {
        $this->role->find($id)->delete();
        Toastr::error('Xóa thành công', 'VAI TRÒ', ["positionClass" => "toast-top-center"]);
        return redirect()->route('role.index');
    }
}
