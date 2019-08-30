@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1> {{ $user->name }} </h1>
            <ul class="list-group">
                @foreach ($user->quotes as $quote)
                <li class="list-group-item">
                    <a href=" {{ route('quotes.show', $quote->slug) }} ">
                        {{ $quote->judul }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
