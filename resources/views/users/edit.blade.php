@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-header">Edycja użytkownika</div>
                <div class="card-body">
                    
                    <img src="{{ url('/user-avatar/' . $user->id . '/488') }}" alt="avatar" class="img-thumbnail img-responsive">
                <br><br>
                    <form action="{{ url('users/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                                    <label for="">Avatar</label>
                                    <input type="file" name="avatar" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" placeholder="Wybierz plik">
                                    
                                    @if ($errors->has('avatar'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                                    <label for="">Imię i Nazwisko</label>
                                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $user->name }}" placeholder="Imię i nazwisko">
                                    
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $user->email }}" placeholder="Email">
                                    
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                            <label for="sex">Płeć</label>
                                <select id="sex" name="sex" class="custom-select">
                                    <option value="m" @if ($user->sex == 'm') selected @endif>Mężczyzna</option>
                                    <option value="f" @if ($user->sex == 'f') selected @endif>Kobieta</option>
                                </select>
                        </div>
                            </div>
                        </div>
                      
                            
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <button type="submit" class="btn btn-primary btn-sm pull-right">Zapisz zmiany</button>
                            </div>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection