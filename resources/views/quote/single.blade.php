@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>{{ $quote->judul }}</h1>
        <p>{{ $quote->subject }}</p>
        <p>Di tulis oleh: {{ $quote->user->name }}</p>

        <p><a href="/quotes" class="btn btn-primary btn-lg">Balik ke daftar</a></p>
    </div>
</div>
@endsection
