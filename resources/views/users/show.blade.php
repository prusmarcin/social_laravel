@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.sidebar')
        <div class="col-md-7">
        @if(Auth::check() && $user->id === Auth::id())
            <div class="card">
                <div class="card-body">
                    @include('posts.create')
                </div>
            </div>
        @endif
        
        @if($posts->count() > 0)
            @foreach($posts as $post)
                @include('posts.include.single')
            @endforeach
            
            <div class='float-left text-center' style='margin-top:20px;'>
                {{ $posts }}
            </div>
        @else
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Ten użytkownik nie ma żadnych postów</h4>
                </div>
            </div>
        @endif
        
            
            
            
        </div>
    </div>
</div>
@endsection

