<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{   
    protected $casts = [
        'setlist' =>'json',
        'encore' =>'json',
    ];

    public function songs()
    {
        return $this->hasMany('App\Models\Song'); 
    }

    public function getTourAttribute($value)
    {
        return array_values(json_decode($value, true) ?: []);
    }

    public function setSetlistAttribute($value)
    {
        $this->attributes['setlist'] = json_encode(array_values($value));
    }

    public function setEncoreAttribute($value)
    {
        $this->attributes['encore'] = json_encode(array_values($value));
    }
}