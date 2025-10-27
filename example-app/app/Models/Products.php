<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $guarded = ["id"];

    public function products()
    {
        return $this->hasMany(Category_Products::class);
    }
}
