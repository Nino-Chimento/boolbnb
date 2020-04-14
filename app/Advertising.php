<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $fillable = [
       
        "name",
        "price",
        "hours"
    ];

    public function flats()
    {
        return $this->belongsToMany('App\Flat');
    }
    
}
