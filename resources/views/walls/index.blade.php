@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-7 col-md-offset-3">
        @if(Auth::check())
            <div class="card">
                <div class="card-body">
                    @include('posts.create')
                </div>
            </div>
        @endif
            
            @foreach($posts as $post)
                @include('posts.include.single')
            @endforeach
            
            <div class='float-left text-center' style='margin-top:20px;'>
                {{ $posts }}
            </div>
        </div>
    </div>
</div>
@endsection

