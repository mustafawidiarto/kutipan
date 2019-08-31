@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>{{ $quote->judul }}</h1>
        <p>{{ $quote->subject }}</p>
        <p>Di tulis oleh: <a href="/profile/{{ $quote->user->id }}">{{ $quote->user->name }}</a></p>

        <p><a href=" {{route('quotes.index')}} " class="btn btn-primary btn-lg">Balik ke daftar</a></p>

        @if($quote->isOwner())
        <p><a href=" {{ route('quotes.edit', $quote->id) }} " class="btn btn-warning btn-lg">Edit</a></p>
        <form action=" {{ route('quotes.destroy', $quote->id) }} " method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-lg">Delete</button>
        </form>
        @endif
    </div>
</div>
@endsection
