<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public function user()
    {
        return $this->belongTo('App\Models\User');
    }
}
