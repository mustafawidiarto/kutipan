@extends('layouts.app')

@push('style')
<style>
    .thumbnail{
        border-radius:5px;
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

    <div class="row">
        @foreach ($quotes as $quote)
        <div class="col-md-4 mb-3">
            <div class="img-thumbnail" >
                <div class="caption">{{ $quote->judul }}</div>
                <a href="/quotes/{{$quote->slug}}" class="btn btn-primary"> Lihat Kutipan </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
