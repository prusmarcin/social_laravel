<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('post_permission', ['except' => [
            'store',
            'show'//uruchom middleware wszedzie za wyjatkiem metody show
        ]]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'post_content' => 'required|min:5'
        ], [
            'required' => 'Musisz wpisać jakąś treść',
            'min' => 'Treść musi mieć minimum :min znaków'
        ]);
        
        Post::create([
           'user_id' => Auth::id(),
            'content' => $request->post_content,
        ]);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(is_admin())
        {
            $post = Post::withTrashed()->where('id', $id)->first();
        } else 
        {
            $post = Post::where('id', $id)->first();
        }
        
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if(is_admin())
        {
            $post = Post::withTrashed()->where('id', $id)->first();
        } else 
        {
            $post = Post::where('id', $id)->first();
        }
        
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'post_content' => 'required|min:5'
        ], [
            'required' => 'Musisz wpisać jakąś treść',
            'min' => 'Treść musi mieć minimum :min znaków'
        ]);
        
        if(is_admin){
            Post::findOrFail($id)->withTrashed()->update([
            'content' => $request->post_content,
        ]);
        } else 
        {
            Post::findOrFail($id)->update([
            'content' => $request->post_content,
        ]);
        }
        
        
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where(['id' => $id])->delete();
        Comment::where('post_id', $id)->delete();
        return back();
    }
}
