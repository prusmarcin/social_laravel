     
  
@if(Auth::check())
    @if(! Auth::user()->likes->contains('post_id', $post->id))
            <form action='{{ url('/likes') }}' method='POST' style='margin-top:10px;'>
                {{ csrf_field() }}
                <input name='post_id' type='hidden' value='{{ $post->id }}'>
                <button type='submit' class='btn btn-primary btn-sm'><i class="far fa-thumbs-up"></i> Polub <span class="badge badge-secondary">{{ $post->likes->count() }}</span></button>
            </form>
    @else
    
            <form action='{{ url('/likes') }}' method='POST' style='margin-top:10px;'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input name='post_id' type='hidden' value='{{ $post->id }}'>
                <button type='submit' class='btn btn-primary btn-sm'><i class="far fa-thumbs-up"></i> Odlub <span class="badge badge-secondary">{{ $post->likes->count() }}</span></button>
            </form>
    
    @endif

@endif

