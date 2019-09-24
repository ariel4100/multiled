<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'text' => 'array',
        'file' => 'array',
        'plans' => 'array',
    ];

    protected $fillable = [
        'code','slug', 'text','plans','order','file','family_id','subfamily_id'
    ];

    public function family(){
        return $this->belongsTo('App\Family');
    }

    public function related() {
        return $this->belongsToMany('App\Product','related_products','product_id','related_id');
    }
}
