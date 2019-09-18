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
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}"
                    placeholder="Tulis judul disini">
            </div>
            <div class="form-group">
                <label for="subject">Isi kutipan</label>
                <textarea name="subject" id="subject" cols="30" rows="10"
                    class="form-control"> {{old('subject')}} </textarea>
            </div>

            <div id="tag_wrapper">
                @if(session('err_tag'))
                    <div class="alert alert-danger">
                        {{ session('err_tag') }}
                    </div>
                @endif
                <label for="">Tag (maksimal 3)</label>
                <div id="add_tag">Add Tag</div>
                @if(old('tags'))
                    @for($i=0; $i < count(old('tags')); $i++)
                        <select name="tags[]" id="tag_select">
                            <option value="0">Tidak Ada</option>
                            @foreach ($tags as $tag)
                            <option value=" {{ $tag->id }} "
                                @if(old('tags.'.$i) == $tag->id)
                                    selected = "selected"
                                @endif>
                                {{ $tag->name }}
                            </option>
                            @endforeach
                        </select>
                    @endfor
                @else
                <select name="tags[]" id="tag_select">
                    <option value="0">Tidak Ada</option>
                    @foreach ($tags as $tag)
                    <option value=" {{ $tag->id }} "> {{ $tag->name }} </option>
                    @endforeach
                </select>
                @endif
            </div>
            <br>

            <button type="submit" class="btn btn-default btn-block">Submit</button>
        </form>
    </div>
</div>
@push('script')
<script src="{{ asset('js/tag.js') }}"></script>
@endpush
@endsection
