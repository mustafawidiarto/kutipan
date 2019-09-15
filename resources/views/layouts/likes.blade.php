@if(Auth::check())
<span class="like_wrapper">
    <span class="total_like">
        <span class="total_number"> {{ $content->likes->count() }} </span> Total Like
    </span>
    <div class="btn {{ $content->is_liked()?'btn-danger btn-unlike':'btn-primary btn-like' }}" data-type=" {{ $model_type }} " data-model-id="{{ $content->id }}">
        {{ $content->is_liked()?'Unlike':'Like' }}
    </div>
    @if($content->isOwner())
    <span class="like_warning" style="color:red; display:none">
        Nggak boleh like sendiri
    </span>
    @endif
</span>
@endif
