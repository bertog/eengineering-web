<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['logo', 'valid'];

    public function scopeVisible($query)
    {
        return $query->where('visible', '=', true);
    }
}
