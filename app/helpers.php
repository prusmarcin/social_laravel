<?php

use App\Friend;

function friendship($friend_id)
{
    $friend_query = Friend::where([
            'user_id' => Auth::id(),
            'friend_id' => $friend_id
        ])->orWhere([
            'user_id' => $friend_id,
            'friend_id' => Auth::id(),
        ])->first();

    $friendship = new stdClass(); //to taka anonimowa klasa


    if (!is_null($friend_query)) {
        $friendship->exists = true;
        $friendship->accepted = $friend_query->accepted;
    } else {
        $friendship->exists = false;
        $friendship->accepted = false;
    }

    return $friendship;
}
