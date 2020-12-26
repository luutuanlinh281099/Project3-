<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
class AdminSliderController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index() {
        $sliders = $this->slider->latest()->paginate(5);
        return view('backend.admin.slider.index', compact('sliders'));
    }

    public function create() {
        return view('backend.admin.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if( !empty($dataImageSlider) ) {
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->create($dataInsert);
            Toastr::success('Thêm mới thành công', 'SLIDER', ["positionClass" => "toast-top-center"]);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('backend.admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if( !empty($dataImageSlider) ) {
                $dataUpdate['image_name'] = $dataImageSlider['file_name'];
                $dataUpdate['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->find($id)->update($dataUpdate);
            Toastr::warning('Cập nhật thành công', 'SLIDER', ["positionClass" => "toast-top-center"]);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }
    
    public function delete($id)
    {
        $this->slider->find($id)->delete();
        Toastr::error('Xóa thành công', 'SLIDER', ["positionClass" => "toast-top-center"]);
        return redirect()->route('slider.index');
    }
}
