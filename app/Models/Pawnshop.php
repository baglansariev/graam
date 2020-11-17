<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pawnshop extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'link',
        'image',
        'longitude',
        'latitude',
        'notes',
    ];
}
