<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $fillable = [
        "flat_id",
        "name",
        "price",
        "hours"
    ];

    protected function flats()
    {
        return $this->hasMany("App\Flat");
    }
}
