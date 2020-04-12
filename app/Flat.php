<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $fillable = [
        "user_id", "title", "img", "address", "position", "slug",
        "summary", "rooms", "bathrooms", "mq", "published","city",
        "latitude","longitude"
    ];

    protected function user(){
        return $this->belongsTo("App\User");
    }

    protected function messages()
    {
        return $this->hasMany("App\Message");
    }

    protected function advertising()
    {
        return $this->belongsTo("App\Advertising");
    }

    public function options()
    {
        return $this->belongsToMany('App\Option');
    }
}
