<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whapp extends Model
{
    protected $fillable = ['chat_id', 'sender_name', 'message'];
}
