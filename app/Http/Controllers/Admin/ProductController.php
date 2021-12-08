<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Gate::authorize('read-product');        

        return view('admin.product.index',[
            'products' => Product::all(),
            'categories' => Category::query()->where('category_id','!=',null)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Gate::authorize('create-product');        


        return view('admin.product.create',[
            'categories' => Category::query()->where('category_id','!=',null)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Gate::authorize('create-product');        


        $image = $request->file('image')->storeAs('/public/products',$request->file('image')->getClientOriginalName());

        Product::query()->create([
            'category_id' => $request->get('category_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'image' => $image
        ]);

        return redirect(route('admin.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        Gate::authorize('update-product',$product);        


        return view('admin.product.edit',[
            'product' => $product,
            'categories' => Category::query()->where('category_id','!=',null)->get(),
        ]);
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

        Gate::authorize('update-product',$product);

        $image = $product->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->storeAs('/public/products',$request->file('image')->getClientOriginalName());
        }

        $product->update([
            'category_id' => $request->get('category_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'image' => $image
        ]);

        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        Gate::authorize('delete-product',$product);        


        Storage::delete($product->image);
        
        $product->delete();

        return back();
    }

    public function search(Request $request)
    {

        $rrr = Category::query()->where('id',$request->cat)->first();



        $products = Product::query()->where('category_id',$request->cat)->get();

        // dd($products->all());

        return view('admin.product.search',[
            'products' => $products,
            'categories' => Category::query()->where('category_id','!=',null)->get(),
            'bbrr' => $rrr->title

        ]);
    }
}
