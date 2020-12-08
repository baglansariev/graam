<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    protected $fillable = ['name'];

    public function documents()
    {
        return $this->hasMany('App\Models\UserDocuments', 'category_id');
    }
}
