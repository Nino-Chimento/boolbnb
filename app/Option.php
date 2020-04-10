<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        "wifi", "parking", "pool", "reception",
        "sauna", "sea_view"
    ];
}
