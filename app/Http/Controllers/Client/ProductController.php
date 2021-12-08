<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {

        $cat = Category::query()->where('id',$category)->first();

        $par = $cat->parent;

        $otherCat = Category::query()->where('category_id',$par->id)->get();




        return view('client.product.index',[
            'category' => Category::query()->where('id',$category)->first(),
            'otherCat' => $otherCat,
            'TopBuy' => OrderDetail::query()->orderBy('count',"DESC")->limit(4)->get(),
            'NewProducts' => Product::query()->orderBy('id',"DESC")->limit(4)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        $comments = Comment::query()->where('product_id',$product->id)->get();

        $cat = Category::query()->where('id',$product->category->id)->first();

        $par = $cat->parent;

        $otherCat = Category::query()->where('category_id',$par->id)->get();


        $connect = Product::query()->where('category_id',$product->category->id)->get();

        return view('client.product.show',[
            'product' => $product,
            'connectPro' => $connect,
            'otherCat' => $otherCat,
            'commentCount' => Comment::query()->where('status','1')->where('product_id',$product->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
