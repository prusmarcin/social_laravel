@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Wyniki wyszukiwania
                </div>
                <div class="card-body">
                    @if($search_results->count() === 0)
                    <h4 class="text-center">Brak wyników</h4>
                    @else
                        <div class="row">
                            @foreach($search_results as $user)
                                <div class="col-sm-4 text-center">
                                    <a href="{{ url('/users/' . $user->id) }}">
                                        <div class="thumbnail"> 
                                            <img src="{{ url('/user-avatar/' . $user->id . '/203') }}" alt="avatar" class="img-thumbnail img-responsive">
                                            <h5>{{ $user->name }}</h5>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            <!-- dodajemy appends aby przekazac parametr q do pagniacji -->
                            {{ $search_results->appends(['q' => $search_phrase])->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection