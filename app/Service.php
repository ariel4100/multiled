<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $casts = [
        'text' => 'array',
        'file' => 'array',
    ];

    protected $fillable = [
        'slug', 'text','order','file'
    ];
}
