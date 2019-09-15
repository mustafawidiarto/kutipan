<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class QuoteComment extends Model
{
    use LikesTrait;

    protected $fillable = [
        'subject','user_id','quote_id'
    ];

    public function quote(){
        return $this->belongsTo('App\Models\Quote');
    }
}
