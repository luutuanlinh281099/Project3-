<?php

namespace App\Http\Controllers;

use App\Newpaper;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AdminNewController extends Controller
{
    private $new;

    public function __construct(Newpaper $new)
    {
        $this->new = $new;
    }

    public function index()
    {
        $news = $this->new->paginate(10);
        return view('backend.admin.new.index', compact('news'));
    }

    public function create()
    {
        return view('backend.admin.new.add');
    }

    public function store(Request $request)
    {
        $this->new->create([
            'name' => $request->name,
            'content' => $request->content,
            'view' => $request->view,
        ]);
        Toastr::success('Thêm mới thành công', 'TIN TỨC', ["positionClass" => "toast-top-center"]);
        return redirect()->route('new.index');
    }

    public function edit($id)
    {
        $new = $this->new->find($id);
        return view('backend.admin.new.edit', compact('new'));
    }

    public function update($id, Request $request)
    {
        $this->new->find($id)->update([
            'name' => $request->name,
            'content' => $request->content,
            'view' => $request->view,
        ]);
        Toastr::warning('Cập nhật thành công', 'TIN TỨC', ["positionClass" => "toast-top-center"]);
        return redirect()->route('new.index');
    }

    public function delete($id)
    {
        $this->new->find($id)->delete();
        Toastr::error('Xóa thành công', 'TIN TỨC', ["positionClass" => "toast-top-center"]);
        return redirect()->route('new.index');
    }
}

