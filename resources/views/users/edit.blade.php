@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-header">Edycja użytkownika</div>
                <div class="card-body">
                    <form action="{{ url('users/' . $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                                    <label for="">Imię i Nazwisko</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Imię i nazwisko">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
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