<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'original_name',
        'title',
        'path',
        'size',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
