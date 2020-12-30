<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AdminOrderController extends Controller
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->latest()->get();
        return view('backend.admin.order.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = $this->order->find($id);
        return view('backend.admin.order.edit', compact('order'));
        Toastr::warning('Cập nhật thành công', 'ĐƠN HÀNG', ["positionClass" => "toast-top-center"]);
    }

    public function update(Request $request, $id)
    {
        $this->order->find($id)->update([
            'order_status' => $request->order_status,
        ]);
        return redirect()->route('order.index');
    }

    public function detail($id)
    {
        $order = $this->order->find($id);
        $orderDetails = $order->orderDetail;
        return view('backend.admin.order.detail', compact('order' ,'orderDetails'));
    }

    public function search(Request $request)
    {
        $from = $request->datefrom;
        $to = $request->dateto;
        $orders = Order::whereBetween('created_at', [$from, $to])->get();
        return view('backend.admin.order.index', compact('orders'));
    }

    public function unconfimred()
    {
        $orders = $this->order->where('order_status', 'chờ xác nhận')->paginate(10);
        return view('backend.admin.order.index', compact('orders'));
    }

    public function shipping()
    {
        $orders = $this->order->where('order_status', 'đang giao hàng')->paginate(10);
        return view('backend.admin.order.index', compact('orders'));
    }

    public function delivered()
    {
        $orders = $this->order->where('order_status', 'đã giao hàng')->paginate(10);
        return view('backend.admin.order.index', compact('orders'));
    }
}
