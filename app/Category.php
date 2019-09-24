<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $casts = [
        'text' => 'array',
    ];

    protected $fillable = [
        'slug', 'text','order'
    ];

    public function news(){
        return $this->hasMany('App\News');
    }
}
