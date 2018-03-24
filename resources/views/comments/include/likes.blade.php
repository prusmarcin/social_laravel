        

@if(Auth::check())
    @if(! Auth::user()->likes->contains('comment_id', $comment->id))
            <form action='{{ url('/likes') }}' method='POST' style='margin-top:10px;'>
            {{ csrf_field() }}
            <input name='comment_id' type='hidden' value='{{ $comment->id }}'>
            <button type='submit' class='btn btn-primary btn-sm'><i class="far fa-thumbs-up"></i> Polub <span class="badge badge-secondary">{{ $comment->likes->count() }}</span></button>
        </form>
    @else
        <form action='{{ url('/likes') }}' method='POST' style='margin-top:10px;'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input name='comment_id' type='hidden' value='{{ $comment->id }}'>
            <button type='submit' class='btn btn-primary btn-sm'><i class="far fa-thumbs-up"></i> Odlub <span class="badge badge-secondary">{{ $comment->likes->count() }}</span></button>
        </form>
    
    @endif

@endif

