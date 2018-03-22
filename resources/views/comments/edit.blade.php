@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('/comments/' . $comment->id) }}" method="POST">
                                 {{ csrf_field() }}
                                 {{ method_field('PATCH') }}

                                 <input class="form-control {{ $errors->has('comment_content') ? ' is-invalid' : '' }}" name="comment_content" value='{{ $comment->content }}' placeholder="Treść komentarza" style="margin-bottom:10px;">
                                 @if ($errors->has('comment_content'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('comment_content') }}</strong>
                                     </span>
                                 @endif
                                 <button class="btn btn-primary float-right" type="submit">Zapisz zmiany</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
