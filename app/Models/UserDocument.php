<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'category_id',
        'title',
        'path',
        'size',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\DocumentCategory', 'category_id');
    }
}
