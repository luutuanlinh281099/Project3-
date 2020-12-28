<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ship;
use Brian2694\Toastr\Facades\Toastr;

class AdminShipController extends Controller
{
    private $ship;

    public function __construct(Ship $ship)
    {
        $this->ship = $ship;
    }

    public function index()
    {
        $ships = $this->ship->paginate(10);
        return view('backend.admin.ship.index', compact('ships'));
    }

    public function create()
    {
        return view('backend.admin.ship.add');
    }

    public function store(Request $request)
    {
        $this->ship->create([
            'name' => $request->name,
            'ship' => $request->ship,
        ]);
        Toastr::success('Thêm mới thành công', 'VẬN CHUYỂN', ["positionClass" => "toast-top-center"]);
        return redirect()->route('ship.index');
    }

    public function edit($id)
    {
        $ship = $this->ship->find($id);
        return view('backend.admin.ship.edit', compact('ship'));
    }

    public function update($id, Request $request)
    {
        $this->ship->find($id)->update([
            'name' => $request->name,
            'ship' => $request->ship,
        ]);
        Toastr::warning('Cập nhật thành công', 'VẬN CHUYỂN', ["positionClass" => "toast-top-center"]);
        return redirect()->route('ship.index');
    }

    public function delete($id)
    {
        $this->brand->find($id)->delete();
        Toastr::error('Xóa thành công', 'VẬN CHUYỂN', ["positionClass" => "toast-top-center"]);
        return redirect()->route('ship.index');
    }
}
