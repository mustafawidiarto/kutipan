@extends('layouts.app')

@push('style')
<style>
    .thumbnail {
        border-radius: 5px;
        border: 1px solid grey;
        padding: 10px 5px;
    }
</style>
@endpush

@section('content')
<div class="container">
    @if(session('msg'))
    <div class="alert alert-success">
        <p>{{ session('msg') }}</p>
    </div>
    @endif

    @if(session('danger'))
    <div class="alert alert-danger">
        <p>{{ session('danger') }}</p>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12 text-center mb-5">
            <a href=" {{ route('quotes.random') }} " class="btn btn-primary">
                Random
            </a>
            @if(!Auth::guest())
            <a href=" {{ route('quotes.create') }} " class="btn btn-primary">
                Create
            </a>
            @endif
        </div>
    </div>

    <div class="row">
        @foreach ($quotes as $quote)
        <div class="col-md-4 mb-3">
            <div class="img-thumbnail">
                <div class="caption">{{ $quote->judul }}</div>
                <div class="tag">
                    Tag:
                    @foreach ($quote->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                </div>
                <a href="/quotes/{{$quote->slug}}" class="btn btn-primary"> Lihat Kutipan </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
