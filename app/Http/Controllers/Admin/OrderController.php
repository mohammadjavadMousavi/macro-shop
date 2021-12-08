<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::query()->where('payment_status','OK')->get();
        return view('admin.order.index',[
            'orders' => $orders
        ]);
    }
}
