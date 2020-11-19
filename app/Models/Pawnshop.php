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
        'price_585',
        'price_999',
        'price_925',
        'loan_percent',
    ];
}
