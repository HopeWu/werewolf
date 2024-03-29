<?php

#check the cookies and the db to decide whether this is an existing user
/*
 * cookies:
 * user_id
 */

use App\Models\User;
use Illuminate\Support\Facades\Cookie;
/*
function loginOrCreate(){
    $u_id_cookie = request()->cookie('user_id');
    if ($u_id_cookie and $user=User::find($u_id_cookie)){
        session(['current_user'=>$user->id]);
        return $user;
    }else{
        # first create this user
        $user=User::create();

        # set the user_id cookies
        $minutes=30*24*60;  # remember a user for a month
        Cookie::queue('user_id', $user->id, $minutes);
        session(['current_user'=>$user->id]);
        return $user;
    }
}
*/
function loginOrCreate(){
    $u_id_session = session('user_id');
    if ($u_id_session and $user=User::find($u_id_session))
    {
        return $user;
    }else{
        # first create this user
        $user=User::create();

        # set the user_id session
        session(['user_id'=>$user->id]);
        return $user;
    }
}