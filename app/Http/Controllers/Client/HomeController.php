<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        

        return view('client.index',[
            'NewProducts' => Product::query()->orderBy('id',"DESC")->limit(4)->get(),
            'categories' => Category::query()->where('category_id',null)->get(),
            'TopBuy' => OrderDetail::query()->orderBy('count',"DESC")->limit(4)->get()
        ]);
    }
}

