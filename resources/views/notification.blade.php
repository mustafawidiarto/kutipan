@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1> Halaman Notifikasi {{ Auth::user()->name }} </h1>
            <ul class="list-group">
                @foreach (Auth::user()->notifications as $notification)
                <li class="list-group-item">
                    <a href=" {{ route('quotes.show', $notification->quote->slug) }} ">
                        {{ $notification->subject }}
                    </a>
                </li>
                @endforeach
            </ul>
            @php
            $notification->where('user_id', Auth::user()->id)->where('seen', 0)->update([
                'seen' => 1
            ]);
            @endphp
        </div>
    </div>
</div>
@endsection
