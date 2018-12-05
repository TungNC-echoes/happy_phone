<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Advertise extends BaseModel
{
    protected $table = 'advertises';

    protected $fillable = [
        'title',
        'content',
        'status',
        'price',
        'note'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
