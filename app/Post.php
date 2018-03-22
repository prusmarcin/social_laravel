<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'user_id', 'content',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');//dzieki temu w postach bedzie mozna nwyswietlic uzytkownika
        //post nalezy do 1 uzytkownika
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
        //jeden post moze miec wiele komentarzy
    }
}
