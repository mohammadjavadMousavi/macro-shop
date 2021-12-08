<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function child()
    {
        return $this->hasMany(Category::class,'category_id');
    }

    public function getHasChildAttribute()
    {
        return $this->child()->count() > 0;
    }

    public function getHasProductAttribute()
    {
        return $this->products()->count() > 0;
    }



    public function getSubChildrenCategory()
    {
        $childrenIds=$this->child()->pluck('id');

        return Product::query()->whereIn('category_id',$childrenIds)->get();
    }



}
