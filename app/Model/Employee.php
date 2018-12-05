<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends BaseModel
{
    protected $table = 'employees';

    protected $fillable = [
        'user_id',
        'salary_per_hour',
        'level',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
