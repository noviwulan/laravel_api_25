<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_products';
    protected $guarded = ['id'];
    protected $fillable = ['name'];

    public function products()
    {
    return $this->hasMany(Product::class, 'category_product_id');
    }
}