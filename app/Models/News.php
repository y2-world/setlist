<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'visible', 'text', 'date', 'image']; // ← 'title' を追加
}
