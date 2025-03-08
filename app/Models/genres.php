<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    protected $table = 'genres';

    protected $fillable = ['name', 'description'];

    public function comments()
    {
        return $this->hasMany(genres::class, 'genre_id');
    }
}
