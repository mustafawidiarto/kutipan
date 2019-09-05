<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($type, $model_id){
        if($type == 1) $model = "App\Models\Quote";
        else $model = "App\Models\QuoteComment";

        Like::create([
            'user_id' => Auth::user()->id,
            'likeable_type' => $model,
            'likeable_id' => $model_id
        ]);
    }
}
