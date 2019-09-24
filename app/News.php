<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $casts = [
        'text' => 'array',
        'file' => 'array',
    ];

    protected $fillable = [
        'slug', 'text','order','file','category_id'
    ];


    public function category(){
        return $this->belongsTo('App\Category');
    }
}
