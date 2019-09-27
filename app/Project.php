<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $casts = [
        'text' => 'array',
        'file' => 'array',
    ];

    protected $fillable = [
        'slug', 'text','order','file'
    ];
}
