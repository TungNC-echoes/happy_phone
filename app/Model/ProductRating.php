<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends BaseModel
{
    protected $table = 'products_rom';

    protected $fillable = [
        'product_id',
        'user_id',
        'star',
        'content'
    ];
}
