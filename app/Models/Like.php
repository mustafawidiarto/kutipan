<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id', 'likeavle_id', 'likeable_type'
    ];

    public $timestamp = false;

    public function likeable(){
        return $this->morphTo();
    }
}
