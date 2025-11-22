<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $guarded = ["id"];

    public function product_category()
    {
        return $this->belongsTo(Product::class);
    }
}
