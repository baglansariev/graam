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
        'price_gold_585',
        'price_gold_999',
        'price_silver_925',
        'price_silver_999',
        'loan_percent',
    ];
}
