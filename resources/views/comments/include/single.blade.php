@if( ! $loop->first)
    <hr style='margin:10px 0px;'>
@endif

@if(Auth::check() && $comment->user_id === Auth::id())
    @include('comments.include.dropdown_menu')
@endif

<div id='comment_{{ $comment->id }}'>
    <img src="{{ url('/user-avatar/' . $comment->user->id . '/35') }}" alt="avatar" class="img-responsive float-left">        
    <div style='padding-left:10px; overflow: hidden;'>
        <a href='{{ url('/users/' . $comment->user->id) }}'><strong>{{ $comment->user->name }}</strong></a><br>
            
       {{ $comment->content }} 
    </div>

</div>

