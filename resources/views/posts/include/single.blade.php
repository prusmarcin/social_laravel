<div class="card" style='margin-top:20px;'>
    <div class="card-body">
        
        @if(Auth::check() && $post->user_id === Auth::id())
            @include('posts.include.dropdown_menu')
        @endif
         
         <div class='clearfix'>
             <img src="{{ url('/user-avatar/' . $post->user->id . '/50') }}" alt="avatar" class="img-thumbnail img-responsive float-left">        
             <div class='float-left' style='margin:3px 10px;'>
                 <a href='{{ url('/users/' . $post->user->id) }}'><strong>{{ $post->user->name }}</strong></a><br>
                 <a href='{{ url('/posts/' . $post->id) }}' class='text-muted'><small><i class="far fa-calendar-alt"></i> {{ $post->created_at }}</small></a>
             </div>
         </div>
        <div id='post_{{ $post->id }}}' style='margin-top:10px;'>
            {{ $post->content }}
        </div>
    </div>                   
</div>

