<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'header_image' ,'body', 'published'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
