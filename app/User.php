<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sex', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //metoda wyswietl znajomi innych
    public function friendsOfOther()
    {
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id')
            ->wherePivot('accepted', 1);
        //wherePivot pozwala powiadomosc eloquent ze w tabeli istnieje pole 'accepted' i mozna wykonac where 
        //aby ograniczyc zapytanie o warunki
        //model user czyli wszyscy uzytkownicy wyswietli nam znajomych bo sparuje uzytkownikow z modelu app user
        //laczac tych uzytkownikow na podstawie tabeli friends na podstawie kluczy obcych
        //dziala to tak ze sprawdcza czy uzytkownik z user_id ma znajomych z friend_id
    }
    
    //moi znajomi
    public function friendsOfMain()
    {
        return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id')
            ->wherePivot('accepted', 1);
        //dziala to tak ze sprawdcza czy uzytkownik z frien_id ma znajomych z user_id
    }
    
    public function friends()
    {
        return $this->friendsOfOther->merge($this->friendsOfMain);
        //w tej metodzie laczymy obie metody aby przez wylowanie metody friends pobrac wszystkich typy znajomych
        //metoda merge() dziala w sposob rekursywny i w kontrolerze wywolujac metode friends() trzeba uzyc bez ->get()
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post')->orderBy('created_at', 'desc');//uzytkownik ma wiele postow
    }
    
    public function role()
    {
        return $this->belongsTo('App\Role');
        //rola nalezy do uzytkownika
        //wtedy ten model sprawdza po role_id, w tablicy users spradzana jest role_id i pobierane jest to z roles
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
        //jeden uzytkownik moze miec wiele lajkow
    }
}
