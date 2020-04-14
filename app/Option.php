<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        "name"
    ];

    public function flats()
    {
        return $this->belongsToMany('App\Flat');
    }
}
