<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = 'profile';

    protected $fillable = ['age','address','users_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
