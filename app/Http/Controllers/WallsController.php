<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class WallsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $friends = Auth::user()->friends();
        $friend_ids_array = [];
        $friend_ids_array[] = Auth::id();
        foreach ($friends as $friend) {
            $friend_ids_array[] = $friend->id;
        }
        
        if(is_admin())
        {
            $posts = Post::with('comments.user')
                ->with('likes')
                ->with('comments.likes')
            ->whereIn('user_id', $friend_ids_array)
            ->orderBy('created_at', 'desc')
            ->withTrashed()
            ->paginate(10); //eager loading
        } else {
            $posts = Post::with('comments.user')
                ->with('likes')
                ->with('comments.likes')
            ->whereIn('user_id', $friend_ids_array)
            ->orderBy('created_at', 'desc')
            ->paginate(10); //eager loading
        }
        
        
        
        return view('walls.index', compact('posts'));
    }
}
