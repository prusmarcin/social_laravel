@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('/posts/' . $post->id) }}" method="POST">
                                 {{ csrf_field() }}
                                 {{ method_field('PATCH') }}

                                 <textarea class="form-control {{ $errors->has('post_content') ? ' is-invalid' : '' }}" name="post_content" cols="60" rows="5" placeholder="Co słychać?" style="margin-bottom:10px;">{{ $post->content }}</textarea>
                                 @if ($errors->has('post_content'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('post_content') }}</strong>
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
