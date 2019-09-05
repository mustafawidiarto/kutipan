@extends('layouts.app')

@push('style')

<style>
    .thumbnail {
        border-radius: 5px;
        border: 1px solid grey;
        padding: 10px 10px;
    }

    /* Style the input field */
    #myInput {
        padding: 20px;
        margin-top: -6px;
        border: 0;
        border-radius: 0;
        background: #f1f1f1;
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
        <div class="col-4">
            <form class="form-inline md-form mr-auto mb-4" action="/quotes" method="get">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                <button class="btn aqua-gradient btn-rounded btn-primary my-0" type="submit">Search</button>
            </form>
        </div>

        <div class="col-md-4 text-center">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tag Filter </button>
                <ul class="dropdown-menu">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">

                    @foreach ($tags as $tag)
                    <li><a href="/quotes/filter/{{$tag->name}}"> {{ $tag->name }} </a></li>
                    @endforeach
                </ul>
            </div>
        </div>


        <div class="col-4 text-right mb-4">
            <a href="/quotes" class="btn btn-primary">
                All
            </a>
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
            <div class="thumbnail">
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

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $(".dropdown-menu li").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endpush
