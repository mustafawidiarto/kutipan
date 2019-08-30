@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center" style="margin: auto">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action=" {{ route('quotes.store') }} " method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" placeholder="Tulis judul disini">
            </div>
            <div class="form-group">
                <label for="subject">Isi kutipan</label>
                <textarea name="subject" id="subject" cols="30" rows="10" class="form-control"> {{old('subject')}} </textarea>
            </div>

            <button type="submit" class="btn btn-default btn-block">Submit</button>
        </form>
    </div>
</div>
@endsection
