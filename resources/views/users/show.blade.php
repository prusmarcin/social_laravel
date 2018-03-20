@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.sidebar')
        <div class="col-md-7">
        @if(Auth::check())
            <div class="card">
                <div class="card-body">
                    @include('posts.create')
                </div>
            </div>
        @endif
            
            @foreach($posts as $post)
                @include('posts.single')
            @endforeach
            
        </div>
    </div>
</div>
@endsection

