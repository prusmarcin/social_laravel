@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3">
           @include('posts.single') 
        </div>
    </div>
</div>
@endsection

