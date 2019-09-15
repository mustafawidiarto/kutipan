<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use LikesTrait;

    protected $fillable = [
        'judul', 'slug', 'subject', 'user_id'
    ];

    public function comments(){
        return $this->hasMany('App\Models\QuoteComment');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
