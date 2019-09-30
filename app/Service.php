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


    public function product() {
        return $this->belongsToMany('App\Product','product_services');
    }
}
