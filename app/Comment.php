<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'post_id', 'user_id', 'content',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
        //komenatrz jest powiazany z 1 uzytkownikiem
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
        //jeden comment ma wiele lajkow
    }
}
