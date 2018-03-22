<div class='col-xs-1 col-md-1 col-lg-1'>
<div class='float-left'>
     <img src="{{ url('/user-avatar/' . Auth::id() . '/35') }}" alt="avatar" class="img-responsive">        
</div>
</div>

<div class='col-xs-11 col-md-11 col-lg-11'>
    <form action="{{ url('/comments') }}" method="POST">
                        {{ csrf_field() }}
                        <input type='hidden' name='post_id' value='{{ $post->id }}'>
                        <input type='text' class="form-control {{ $errors->has('post_' . $post->id . '_comment_content') ? ' is-invalid' : '' }}" name="post_{{ $post->id }}_comment_content" placeholder="Skomentuj" style="margin-bottom:10px;" value='{{ old('post_' . $post->id . '_comment_content') }}'>
                        <button class="btn btn-default btn-sm float-right" type="submit">Dodaj komentarz</button>
                        @if ($errors->has('post_' . $post->id . '_comment_content'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('post_' . $post->id . '_comment_content') }}</strong>
                            </span>
                        @endif

                    </form>
</div>
                    