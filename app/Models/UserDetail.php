<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'inn',
        'company_name',
        'company_address',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
