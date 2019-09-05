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

        <form action=" {{ route('comment.update', $comment) }} " method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="subject">Isi Komentar</label>
                <textarea name="subject" id="subject" cols="30" rows="1" class="form-control"> {{ old('subject')? old('subject') : $comment->subject }} </textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Update Komentar</button>
        </form>
    </div>
</div>
@endsection
