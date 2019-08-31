<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Quote;
use App\Models\QuoteComment;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::all();
        return view('quote.index', compact('quotes'));
    }

    public function create()
    {
        if(Auth::guest()) return redirect('/quotes')->with('danger','Anda tidak memiliki hak akses');
        return view('quote.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'subject' => 'required|min:5',
        ]);

        //$slug = str_slug($request->title, '-').'-'.now(); ->agar memiliki judul yang unik
        $slug = str_slug($request->title, '-');

        if(Quote::where('slug', $slug)->first() != null)
            $slug = $slug.'-'.time();

        Quote::create([
            'judul' => $request->title,
            'slug' => $slug,
            'subject' => $request->subject,
            'user_id' =>Auth::user()->id
        ]);

        return redirect()->route('quotes.index')->with('msg', 'kutipan berhasil di submit');
    }

    public function show($slug)
    {
        $quote = Quote::with('comments.user')->where('slug', $slug)->first();

        if(empty($quote)) abort(404);

        return view('quote.single',compact('quote'));
    }

    public function edit($id)
    {
        $quote = Quote::findOrFail($id);

        if($quote->isOwner()){
            return view('quote.edit', compact('quote'));
        }else{
            return redirect()->route('quotes.index')->with('danger', 'Anda tidak memiliki hak akses');
        }

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'subject' => 'required|min:5',
        ]);

        //slug tidak di update karena akan berpengaruh pada SEO
        $quote = Quote::findOrFail($id);
        if($quote->isOwner()){
            $quote->update([
                'judul' => $request->title,
                'subject' => $request->subject,
            ]);

            return redirect()->route('quotes.index')->with('msg', 'kutipan berhasil di update');
        }else{
            return redirect()->route('quotes.index')->with('danger', 'Anda bukan pemilik kutipan');
        }
    }

    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        if($quote->isOwner()){
            $quote->delete();
            return redirect()->route('quotes.index')->with('msg', 'kutipan berhasil di hapus');
        }else{
            return redirect()->route('quotes.index')->with('danger', 'Anda bukan pemilik kutipan');
        }
    }

    public function random(){
        $quote = Quote::inRandomOrder()->first();

        if(empty($quote)) abort(404);

        return view('quote.single',compact('quote'));
    }
}
