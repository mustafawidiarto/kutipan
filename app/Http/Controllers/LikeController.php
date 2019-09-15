<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Like;
use App\Models\Quote;
use App\Models\QuoteComment;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($type, $model_id)
    {
        $user = Auth::user();

        $result = $this->check_type($type, $model_id);
        $model_type = $result[0];
        $model = $result[1];

        //user gak boleh like sendiri
        if($model->isOwner())
            die('0');

        //user gak boleh like berkali-kali
        if($model->is_liked() == 0){
            Like::create([
                'user_id' => Auth::user()->id,
                'likeable_type' => $model_type,
                'likeable_id' => $model_id
            ]);
        }
    }

    public function unlike($type, $model_id)
    {
        $user = Auth::user();

        $result = $this->check_type($type, $model_id);
        $model_type = $result[0];
        $model = $result[1];

        //user gak boleh like berkali-kali
        if($model->is_liked() > 0){
            Like::where('user_id', $user->id)
                ->where('likeable_id',$model_id)
                ->where('likeable_type', $model_type)->delete();
        }
    }

    public function check_type($type, $model_id)
    {
        if($type == 1){
            $model_type = "App\Models\Quote";
            $model = Quote::find($model_id);
        }
        else{
            $model_type = "App\Models\QuoteComment";
            $model = QuoteComment::find($model_id);
        }

        return array($model_type, $model);
    }
}
