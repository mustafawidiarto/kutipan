<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Quote;
use App\Models\QuoteComment;
use Illuminate\Http\Request;

class QuoteCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Quote $quote)
    {
        $this->validate($request,[
            'subject' => 'required',
        ]);

        $comment = QuoteComment::create([
            'subject' => $request->subject,
            'quote_id' => $quote->id,
            'user_id' => Auth::user()->id
        ]);


        return redirect()->route('quotes.show', $quote->slug)->with('success-comment-'.$comment->id, 'Berhasil menambahkan komentar');
    }

    public function edit(QuoteComment $comment)
    {
        if($comment->user_id == Auth::user()->id){
            return view('quote-comment.edit', compact('comment'));
        }
        return redirect()->route('quotes.show', $comment->quote->slug)->with('danger-comment-'.$comment->id,'Komentar ini bukan milik anda');
    }

    public function update(Request $request, QuoteComment $comment)
    {
        $this->validate($request,[
            'subject' => 'required'
        ]);

        if($comment->user_id == Auth::user()->id){
            $comment->update([
                'subject' => $request->subject
            ]);

            return redirect()->route('quotes.show', $comment->quote->slug)->with('success-comment-'.$comment->id,'Berhasil mengubah komentar');
        }

        return redirect()->route('quotes.show', $comment->quote->slug)->with('danger-comment-'.$comment->id,'Komentar ini bukan milik anda');
    }

    public function destroy(Request $request, QuoteComment $comment)
    {
        $slug = $comment->quote->slug;
        if($comment->user_id == Auth::user()->id){
            $comment->delete();
        }

        return redirect()->route('quotes.show', $slug);
    }
}
