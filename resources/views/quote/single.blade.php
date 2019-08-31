@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>{{ $quote->judul }}</h1>
        <p>{{ $quote->subject }}</p>
        <p>Di tulis oleh: <a href="/profile/{{ $quote->user->id }}">{{ $quote->user->name }}</a></p>

        <a href=" {{route('quotes.index')}} " class="btn btn-primary">Balik ke daftar</a>

        @if($quote->isOwner())
        <a href=" {{ route('quotes.edit', $quote->id) }} " class="btn btn-warning">Edit</a>
        <form action=" {{ route('quotes.destroy', $quote->id) }} " method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        @endif
    </div>

    @if(count($errors) > 0)
    <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
    </div>
    @endif

    @if(session('msg'))
    <div class="alert alert-success">
        <li>{{ session('msg') }}</li>
    </div>
    @endif

    <form action=" {{route('comment', $quote)}} " method="POST">
        @csrf
        <div class="form-group">
            <label for="subject">Isi Komentar</label>
            <textarea name="subject" id="subject" cols="30" rows="1" class="form-control"> {{old('subject')}} </textarea>
        </div>

        <button type="submit" class="btn btn-default btn-block">Komentar</button>
    </form>

    <div class="comment mt-5">
        @foreach($comments as $comment)
            <p><a href="/profile/{{$comment->user_id}}"> {{ $comment->user->name }} </a></p>
            <p> {{ $comment->subject }} </p>
            <hr>
        @endforeach
    </div>
</div>
@endsection
