<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['cover', 'title', 'slug', 'sub_title', 'body'];
}