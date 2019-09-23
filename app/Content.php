<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

    protected $casts = [
        'text' => 'array',
        'file' => 'array',
        'slider' => 'array'
    ];

    protected $fillable = [
        'section', 'file', 'text','order','slider'
    ];
}
