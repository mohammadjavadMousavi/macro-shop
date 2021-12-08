<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Http\Request;


class Cart extends Model
{    



    public static function new(Product $product,Request $request)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }

        $cart[$product->id] = [
            'product' => $product,
            'quantity' => $request->get('quantity')
        ];

        session()->put([
            'cart' => $cart,

        ]);

        $cart['total_amount'] = Cart::totalAmount();

        $cart['total_count'] = Cart::totalItem();
        
        session()->put([
            'cart' => $cart,

        ]);
      
       
    }

    public static function totalAmount()
    {


        $totalAmount = 0;

            foreach (self::getProduct() as $cartItem) {
                        
                    $totalAmount += $cartItem['product']->price * $cartItem['quantity'];

            }
      
        return $totalAmount;
    }

 


    public static function totalItem()
    {
        $item=collect(self::sesh())->filter(function ($item)
        {
            return is_array($item);
        });

        return count($item);
    }
    public static function getProduct()
    {
        return collect(self::sesh())->filter(function ($item)
        {
            return is_array($item);
        });
    }

    public static function sesh()
    {
        if (!session()->has('cart')) {
            return null;
        }

        return session()->get('cart');
    }

    public static function remove(Product $product)
    {
        if (session()->has('cart')) {
            $cart = self::getProduct();
        }

        $cart->forget($product->id);

        session()->put([
            'cart' => $cart
        ]);

        $cart['total_amount'] = self::totalAmount();

        $cart['total_count'] = self::totalItem();

        session()->put([
            'cart' => $cart
        ]);
    }

    public static function removeAll()
    {
        session()->forget('cart');
    }

}
