<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
class AdminUserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->paginate(10);
        return view('backend.admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('backend.admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            Toastr::success('Thêm mới thành công', 'THÀNH VIÊN', ["positionClass" => "toast-top-center"]);
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $rolesOfUser = $user->roles;
        return view('backend.admin.user.edit', compact('roles', 'user', 'rolesOfUser'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            Toastr::warning('Cập nhật thành công', 'THÀNH VIÊN', ["positionClass" => "toast-top-center"]);
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        $this->user->find($id)->delete();
        Toastr::error('Xóa thành công', 'THÀNH VIÊN', ["positionClass" => "toast-top-center"]);
        return redirect()->route('user.index');
    }
}

