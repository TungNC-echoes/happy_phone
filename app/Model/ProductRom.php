<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductRom extends BaseModel
{
    protected $table = 'products_rom';

    protected $fillable = [
        'product_id',
        'ram',
        'plus_price'
    ];
}
