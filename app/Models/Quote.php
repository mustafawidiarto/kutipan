<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'judul', 'slug', 'subject', 'user_id'
    ];

    public function user()
    {
        return $this->belongTo('App\Models\User');
    }
}
