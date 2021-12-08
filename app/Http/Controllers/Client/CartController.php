<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{

    public function index()
    {
        return view('client.cart.index',[
            'items' => Cart::getProduct(),
            'totalCount' => Cart::totalItem(),
            'totalAmount' => Cart::totalAmount(),
        ]);
    }

    public function store(Request $request,Product $product)
    {



        Cart::new($product,$request);


        return response([
            'msg' => 'successful',
            'cart' => session()->get('cart'),

        ],200);
    }

    
    public function destroy(Product $product)
    {
        Cart::remove($product);

        return response([
            'msg' => 'remove',
            'cart' => Cart::sesh()
        ]);
    }
}
