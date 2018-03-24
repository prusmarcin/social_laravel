<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikesController extends Controller
{
    public function add(Request $request)
    {
        Like::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'comment_id' => $request->comment_id,
        ]);
        
        return back();
    }
    
    public function destroy(Request $request)
    {
        Like::where([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'comment_id' => $request->comment_id,
        ])->delete();
        
        return back();
    }
}
