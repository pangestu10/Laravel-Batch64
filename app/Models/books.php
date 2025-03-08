<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $table = 'books';

    protected $fillable = ['title','summary','image','stock','genres_id'];

    public function genres()
    {
        return $this->belongsTo(genres::class,'genres_id');
    }
}
