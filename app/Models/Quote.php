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

    public function comments(){
        return $this->hasMany('App\Models\QuoteComment');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    public function likes(){
        return $this->morphMany('App\Models\Like', 'likeable');
    }

    public function is_liked(){
        return $this->likes()->where('user_id', Auth::user()->id)->count();
    }

    public function isOwner(){
        if(Auth::guest())
            return false;
        return Auth::user()->id == $this->user_id;
    }
}
