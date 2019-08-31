<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Quote;
use App\Models\QuoteComment;
use Illuminate\Http\Request;

class QuoteCommentController extends Controller
{
    public function store(Request $request, Quote $quote){
        $this->validate($request,[
            'subject' => 'required',
        ]);

        QuoteComment::create([
            'subject' => $request->subject,
            'quote_id' => $quote->id,
            'user_id' => Auth::user()->id
        ]);


        return redirect()->route('quotes.show', $quote->slug)->with('msg','Berhasil menambahkan komentar');
    }
}
