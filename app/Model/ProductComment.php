<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends BaseModel
{
    protected $table = 'products_comment';

    protected $fillable = [
        'product_id',
        'parent_id',
        'user_id',
        'content'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
