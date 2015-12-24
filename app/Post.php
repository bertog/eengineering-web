<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'header_image' ,'body', 'published'];

    public static function boot()
    {
        parent::boot();

        static::creating(function($post) {
            $post->slug = str_slug($post->title);

            $latestSlug =
                static::whereRaw("slug RLIKE '^{$post->slug}(-[0-9]*)?$'")
                    ->latest('id')
                    ->pluck('slug');

            if (! $latestSlug->isEmpty()) {
                $pieces = explode('-', $latestSlug->first());
                $number = intval(end($pieces));
                $post->slug .=  '-' . ($number + 1);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeTitled($query, $title)
    {
        $title = str_replace('-', ' ', $title);

        return $query->where(compact('title'));
    }
}
