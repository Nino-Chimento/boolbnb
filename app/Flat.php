<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $fillable = [
        "user_id", "title", "img", "address", "position", "slug",
        "summary", "rooms", "bathrooms", "mq"
    ];
}
