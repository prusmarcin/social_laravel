@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Powiadomienia
                </div>
                <div class="card-body">
                    @if(Auth::user()->notifications->count() === 0)
                    <h4 class="text-center">Brak powiadomień</h4>
                    @else
                        <ul class='list-group'>
                            @foreach(Auth::user()->notifications as $notification)
                                <li class='list-group-item{{ ! is_null($notification->read_at) ? ' trashed' : '' }}'>
                                    <?= html_entity_decode($notification->data['message']); ?>
                                    
                                    @if(is_null($notification->read_at))
                                    <form action="{{ url('/notifications/' . $notification->id) }}" method="POST" class="float-right">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <button class="btn btn-info btn-sm float-right" type="submit">Przeczytane</button>
                                    </form>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection