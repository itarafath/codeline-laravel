<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'films';
    protected $fillable = ['name', 'slug', 'rating', 'country_id', 'photo', 'description', 'release_date', 'ticket_price'];


    public function genres()
    {
        return $this->hasMany('App\Genre');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function country()
    {
        return $this->hasOne('App\Country');
    }
}
