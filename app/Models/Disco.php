<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disco extends Model
{
    protected $casts = [
        'tracklist' =>'json',
    ];

    public function getTourAttribute($value)
    {
        return array_values(json_decode($value, true) ?: []);
    }

    public function setSetlistAttribute($value)
    {
        $this->attributes['tracklist'] = json_encode(array_values($value));
    }
}
