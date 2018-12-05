<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'status',
        'employee_id',
        'total_product_price',
        'ship_price',
        'time_delivery',
        'note'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
