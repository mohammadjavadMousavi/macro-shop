<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    public function __construct()
    {
        Gate::authorize('view-dashbord');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Gate::authorize('create-category');

        return view('admin.category.create',[
            'categories' => Category::query()->where('category_id',null)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Gate::authorize('create-category');


        Category::query()->create([
            'title' => $request->get('title'),
            'status' => $request->get('status'),
            'category_id' => null
        ]);

        return redirect(route('admin.category.create'));
      
    }


    public function storeSub(CategoryRequest $request)
    {
        // dd($request->all());

        Gate::authorize('create-category');


        Category::query()->create([
            'title' => $request->get('title'),
            'status' => $request->get('status'),
            'category_id' => $request->get('category_id')
        ]);

        return redirect(route('admin.category.create'));
      
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
