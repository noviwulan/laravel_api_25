<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = ["id"];

    public function category_product()
    {
        return $this->belongsTo(CategoryProduct::class,'product_category_id');
    }
    public function product_variant()
    {
        return $this->hasMany(CategoryProduct::class);
    }

}
