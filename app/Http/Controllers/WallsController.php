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
        
        $posts = Post::whereIn('user_id', $friend_ids_array)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('walls.index', compact('posts'));
    }
}