<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        if (Cart::totalItem() <= 0) {
            return back()->withErrors(['basket' => 'سبد شما خالی است']);
            
        }
        

        $order = Order::query()->create([
            'user_id' => auth()->user()->id,
            'amount' => Cart::totalAmount(),
        ]);


        foreach (Cart::getProduct() as $item) {

            $product = $item['product'];
            $productQty = $item['quantity'];

            $order->details()->create([
                'product_id' => $product->id,
                'unit_amount' => $product->price,
                'count' => $productQty,
                'total_amount' => $productQty * $product->price
            ]);
        }

        Cart::removeAll();


        $invoice = (new Invoice)->amount($order->amount);

        return Payment::purchase($invoice,function ($drive , $transactionId) use ($order)
        {
            $order->update([
                'transaction_id' => $transactionId
            ]);

        })->pay()->render();    
    }

    public function callback(Request $request)
    {
        $order = Order::query()->where('transaction_id',$request->get('Authority'))->first();

        $order->update([
            'payment_status' => $request->get('Status')
        ]);

        return redirect(route('client.order.show',$order));
    }

    public function show(Order $order)
    {
        return view('client.order.show',[
            'order' => $order
        ]);
    }
}
