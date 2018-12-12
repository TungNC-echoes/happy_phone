<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebInfo extends Model
{
    protected $table = 'web_infos';
    protected $fillable = [
        'label',
        'title',
        'content',
        'url'
    ];
}
