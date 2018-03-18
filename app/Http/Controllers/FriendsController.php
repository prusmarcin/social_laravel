<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add($friend_id)
    {
        if (friendship($user->id)->exists) {
            Friend::create([
                'user_id' => Auth::id(),
                'friend_id' => $friend_id
            ]);
        }


        /* $friend = new Friend;
          $friend->user_id = Auth::id();
          $friend->friend_id = $friend_id;
          $friend->save(); */

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept($friend_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($friend_id)
    {
        //
    }
}
