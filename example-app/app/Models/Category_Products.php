<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_Products extends Model
{
    protected $guarded = ["id"];

    public function product_category()
    {
        return $this->belongsTo(Products::class);
    }
}
