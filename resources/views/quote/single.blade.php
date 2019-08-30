@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>{{ $quote->judul }}</h1>
        <p>{{ $quote->subject }}</p>
        <p>Di tulis oleh: {{ $quote->user->name }}</p>

        <p><a href="/quotes" class="btn btn-primary btn-lg">Balik ke daftar</a></p>

        @if($quote->isOwner())
        <p><a href="/quotes" class="btn btn-warning btn-lg">Edit</a></p>
        <p><a href="/quotes" class="btn btn-danger btn-lg">Delete</a></p>
        @endif
    </div>
</div>
@endsection
