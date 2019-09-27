<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $casts = [
        'text' => 'array',
        'file' => 'array',
    ];

    protected $fillable = [
        'slug', 'text','order','file'
    ];

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
