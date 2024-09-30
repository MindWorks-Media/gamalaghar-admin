<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.view_order', compact('orders'));
    }

    public function singleorder(string $id)
    {
        $order = Order::with('orderItems')->where('id', $id)->first();
        $productId = $order->orderItems->pluck('product_id')->toArray();
        $productImages = Product::with('media')->whereIn('id', $productId)->get();
        return view('admin.orders.view_single_order', compact('order', 'productImages'));
    }

    public function searchOrder(Request $request)
    {
        $keyword = $request->query('keyword');
        $orders = Order::when($keyword, function ($query) use ($keyword) {
            $query->where('order_number', 'like', "%{$keyword}%");
        })->latest()->paginate(10);

        return view('admin.orders.view_order', compact('orders'));
    }
}
