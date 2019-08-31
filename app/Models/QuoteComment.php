<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteComment extends Model
{
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function quote(){
        return $this->belongsTo('App\Models\Quote');
    }
}
