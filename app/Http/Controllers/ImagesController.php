<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{

    public function user_avatar($id, $size)
    {
        $user = User::findOrFail($id);
        
        if(is_null($user->avatar)){
            $img = Image::make('https://cdn3.iconfinder.com/data/icons/faticons/32/user-01-512.png')->fit($size)->response('jpg', 90); 
        } elseif (strpos($user->avatar, 'http') !== false) {
            $img = Image::make($user->avatar)->fit($size)->response('jpg', 90);
        } else {
            $avatar_path = asset('storage/users/' . $id . '/avatars/' . $user->avatar);
            $img = Image::make($avatar_path)->fit($size)->response('jpg', 90);
        }

        return $img;
    }
}
