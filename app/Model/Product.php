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

    public function colors()
    {
        return $this->hasMany('App\Model\ProductColor','product_id','id');
    }

    public function roms()
    {
        return $this->hasMany('App\Model\ProductRom', 'product_id', 'id');
    }

    public function rams()
    {
        return $this->hasMany('App\Model\ProductRam', 'product_id', 'id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Model\ProductRating', 'product_id', 'id');
    }

    public function detail()
    {
        return $this->hasOne('App\Model\ProductDetail', 'product_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Model\ProductComment', 'product_id', 'id');
    }
}
