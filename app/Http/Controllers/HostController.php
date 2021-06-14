<?php


namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\User;
use App\Models\PlayGame;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HostController extends Controller
{
    public function host(Request $request){
        $roomId = $request['_roomId'];
        $room = Game::find($roomId);
        $user = loginOrCreate();

        if((! $room->host) or ($room->set_host_at < Carbon::now()->subMinutes(90))){
            # there is no host yet, this user becomes the first host of this game
            $user->hostGame($room);
            return view("game.room", ["room"=>$room, "user"=>$user]);
        }else{
            # there is a host, who hasn't retired yet, the current user cannot be a host of this game
            return "已经有主持人";
        }
    }

    public function hostResign(Request $request){
        $roomId = $request['_roomId'];
        $room = Game::find($roomId);
        $user = loginOrCreate();

        if(($room->host) and $room->host == $user){
            # this user is the host, can resign
            $room->update(["host_id"=>null]);
            return view("game.host-resigned", ['room'=>$room, 'user'=>$user]);
        }else{
            # there is a host, who hasn't retired yet, the current user cannot be a host of this game
            return "您还不是主持人";
        }
    }
}