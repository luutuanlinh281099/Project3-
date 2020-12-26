<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingRequest;
use App\Setting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class AdminSettingController extends Controller
{

    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('backend.admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('backend.admin.setting.add');
    }

    public function store(AddSettingRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ]);
        Toastr::success('Thêm mới thành công', 'CÀI ĐẶT', ["positionClass" => "toast-top-center"]);
        return redirect()->route('setting.index');
    }
    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('backend.admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value
        ]);
        Toastr::warning('Cập nhật thành công', 'CÀI ĐẶT', ["positionClass" => "toast-top-center"]);
        return redirect()->route('setting.index');
    }

    public function delete($id)
    {
        $this->setting->find($id)->delete();
        Toastr::error('Xóa thành công', 'CÀI ĐẶT', ["positionClass" => "toast-top-center"]);
        return redirect()->route('setting.index');
    }
}
