@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 col-md-offset-1">
            <div class="card">
                <div class="card-header">
                    Dane użytkownika
                    @if ($user->id === Auth::id())
                        <a href="{{ url('/users/' . $user->id . '/edit') }}" class="pull-right"><small>Edytuj</small></a>
                    @endif
                </div>

                <div class="card-body text-center">
                     <img src="{{ url('/user-avatar/' . $user->id . '/203') }}" alt="avatar" class="img-thumbnail img-responsive">
                    <h2><a href="{{ url('/users/' . $user->id) }}">{{ $user->name }}</a></h2>   
                    <p> 
                        @if ($user->sex == 'm')
                            Mężczyzna
                        @else 
                            Kobieta
                        @endif
                    </p>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

