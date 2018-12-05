<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends BaseModel
{
    protected $table = 'orders_detail';

    protected $fillable = [
        'product_id',
        'product_color_id',
        'product_ram_id',
        'product_rom_id',
        'order_id',
        'quantity',
        'note'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function color()
    {
        return $this->hasOne(ProductColor::class);
    }

    public function ram()
    {
        return $this->hasOne(ProductRam::class);
    }

    public function rom()
    {
        return $this->hasOne(ProductRom::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
