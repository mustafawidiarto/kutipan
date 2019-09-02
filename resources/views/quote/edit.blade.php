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

        <form action=" {{ route('quotes.update', $quote->id) }} " method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title')? old('title') : $quote->judul }}" placeholder="Tulis judul disini">
            </div>
            <div class="form-group">
                <label for="subject">Isi kutipan</label>
                <textarea name="subject" id="subject" cols="30" rows="10"
                    class="form-control"> {{ old('subject')? old('subject') : $quote->subject }} </textarea>
            </div>

            <div id="tag_wrapper">
                @if(session('err_tag'))
                <div class="alert alert-danger">
                    {{ session('err_tag') }}
                </div>
                @endif

                <label for="">Tag (maksimal 3)</label>
                <div id="add_tag">Add Tag</div>

                @foreach ($quote->tags as $oldtag)
                    <select name="tags[]" id="tag_select">
                        <option value="0">Tidak Ada</option>
                        @foreach ($tags as $tag)
                        <option value=" {{ $tag->id }} " {{ $oldtag->id==$tag->id?'selected':'' }}> {{ $tag->name }} </option>
                        @endforeach
                    </select>
                @endforeach
            </div>
            <br>
            <button type="submit" class="btn btn-default btn-block">UPDATE</button>
        </form>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function () {
        var counter = "<?php echo $counter; ?>";

        console.log(counter);
        $('#add_tag').click(function () {
            counter++;
            if(counter <= 3)
                $('#tag_select').clone().appendTo('#tag_wrapper');
        });
    });
</script>
@endpush
