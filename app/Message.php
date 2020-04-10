<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        "flat_id",
        "email",
        "name",
        "number_phone",
        "message"
    ];

    protected function flat(){
        return $this->belongsTo("App\Flat");
    }
}
