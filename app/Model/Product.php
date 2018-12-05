<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'type',
        'brand',
        'price',
        'sale',
        'new',
        'description',
        'remaining'
    ];
}
