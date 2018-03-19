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
                    
                    <p><a href="{{ url('/users/' . $user->id . '/friends') }}">Znajomi</a> <span class="badge badge-secondary">{{ $user->friends()->count() }}</span></p>
                    
                    {{-- Auth::check() sprawdz czy uzytkownik jest zalogowany --}}
                    @if(Auth::check() && $user->id !== Auth::id())
                    
                        {{-- jeżeli znajomosc nie istnieje i nie jest zaakceptowana --}}
                        @if( ! friendship($user->id)->exists && ! has_friend_invitation($user->id))
                            
                           <form method='POST' action='{{ url('/friends/' . $user->id) }}'>
                                {{ csrf_field() }}
                                <button class='btn btn-success'>Zaproś do znajomych</button>
                            </form>
                        
                        @elseif(has_friend_invitation($user->id))
                        
                            <form method='POST' action='{{ url('/friends/' . $user->id) }}'>
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <button class='btn btn-primary'>Przyjmij zaproszenie</button>
                            </form>
                        
                        {{-- jeżeli znajomosc istnieje i nie jest zaakceptowana --}}
                        @elseif(friendship($user->id)->exists && ! friendship($user->id)->accepted)
                            <button class='btn btn-success disabled'>Zaproszenie wysłane</button>
                        @elseif(friendship($user->id)->exists && friendship($user->id)->accepted)
                        
                            <form method='POST' action='{{ url('/friends/' . $user->id) }}'>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class='btn btn-danger'>Usuń ze znajomych</button>
                            </form>
                        
                        @endif
                    
                    
                        
                    @endif
                    
                </div>
            </div>
        </div>
