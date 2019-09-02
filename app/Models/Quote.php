<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'judul', 'slug', 'subject', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function isOwner(){
        if(Auth::guest())
            return false;
        return Auth::user()->id == $this->user_id;
    }

    public function comments(){
        return $this->hasMany('App\Models\QuoteComment');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
