<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request , Product $product)
    {

        // dd($request->all());

        $this->validate($request ,[
            'content' => ['required','min:5','max:200'],
            'name' => ['required'],
        ]);

        Comment::query()->create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'content' => $request->get('content'),
            'name' => $request->get('name')
        ]);

        return redirect()->back();
    }
}
