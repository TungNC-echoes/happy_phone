<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageSystem extends Model
{
    protected $table = 'image_systems';
    protected $fillable = [
        'label',
        'url'
    ];
}
