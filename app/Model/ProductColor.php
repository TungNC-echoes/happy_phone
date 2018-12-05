<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends BaseModel
{
    protected $table = 'products_color';

    protected $fillable = [
        'product_id',
        'color',
        'image',
        'plus_price'
    ];
}
