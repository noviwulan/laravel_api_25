<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }
}
