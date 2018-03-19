@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Lista znajomych <span class="badge badge-secondary">{{ $user->friends()->count() }}</span>
                </div>
                <div class="card-body">
                    {{-- metoda friends() jest z modelu User--}}
                    @if($user->friends()->count() === 0)
                    <h4 class="text-center">Brak znajomych</h4>
                    @else
                        <div class="row">
                            @foreach($user->friends() as $friend)
                                <div class="col-sm-4 text-center">
                                    <a href="{{ url('/users/' . $friend->id) }}">
                                        <div class="thumbnail"> 
                                            <img src="{{ url('/user-avatar/' . $friend->id . '/203') }}" alt="avatar" class="img-thumbnail img-responsive">
                                            <h5>{{ $friend->name }}</h5>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection