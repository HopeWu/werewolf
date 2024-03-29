<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\PlayGame;
use App\Models\Card;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class PlayGameController extends Controller
{
    /**
     * shuffle cards for a game and distribute them.
     *
     * @return \Illuminate\Http\Response
     */

    public function shuffleNew(int $roomId)
    {
        /*
         * check if the room has enough players
         */
        # get the set total of players of the room
        $game = Game::find($roomId);
        $setTotal = $game->total;

        # get the player ids that entered the room within the last one hour
        $game_plays = $game->hasMany(PlayGame::class);
        # get the total of players that entered the room within the last one hour and a half
        $total = $game_plays->where('enter_game_at', '>', now()->subMinutes(90))->get()->pluck('player_id')->count();

        /*
         *  an alternative to the above
         */
        #$total = $game->users()->where('enter_game_at', '>', now()->subHour())->count();

        # check if the room has enough players
        if ($total < $setTotal) {
            return view('game.error', ['error' => "有玩家还未进房！"]);
        }

        $warning = "";
        if ($total > $setTotal) {
            # more player want to play. Maybe need a reset of the game
            $warning = '实际参与人数大于房间设定。';
        }

        /*
         * get all the cards of the room into an array
         */
        $card_ids = [];
        $room = Game::find($roomId);
        $card_types = ['villager', 'wolf', 'prophet', 'guardian', 'hunter',
            'witch', 'knight', 'wolf-king', 'white-wolf-king'];
        foreach ($card_types as $attr) {
            $card_type_id = Card::where('name', $attr)->first()->id;
            $card_type_count = $room[$attr];
            for ($i = 0; $i < $card_type_count; $i++) {
                array_push($card_ids, $card_type_id);
            }
        }
        # shuffle the cards
        shuffle($card_ids);
        $card_names = [];
        foreach ($card_ids as $card_id) {
            array_push($card_names, Card::find($card_id)->chinese_name);
        }

        # distribute the cards to its players
        $distribution = [];
        $player_ids = $game_plays->orderBy('enter_game_at', 'desc')->pluck('player_id')->take($setTotal);
        foreach ($player_ids as $index => $player_id) {
            $room->assignRole($player_id, $card_ids[$index]);
            $distribution[$player_id] = $card_names[$index];
        }
        session(['distribution' => $distribution]);
        return redirect("/dashboard/$room->id");
    }

    public function shuffle(Request $request)
    {
        $room = Game::find($request['_roomId']);
        if ($room and $room->host_id == loginOrCreate()->id) {
            return $this->shuffleNew($request['_roomId']);
        } else {
            return view("game.error", ["error" => "您不是主持人，无法发牌。"]);
        }
    }

    /**
     * Enter a game.
     *
     * @return \Illuminate\Http\Response
     */
    public function enter(Request $request)
    {
        $attributes = request()->validate(["roomId" => ["numeric", "nullable"]]);
        if (request('roomId')) {
            $roomId = $attributes['roomId'];

            $user = loginOrCreate();

            # enter the room
            $room = Game::find($roomId);
            if ($room) {
                if ($room->set_host_at and $room->set_host_at < Carbon::now()->subMinutes(90)) {
                    # there is no valid host, surely join the user into the game as an ordinary player and clear host
                    $room->update(["host_id" => null]);
                    $room->refresh();
                    $user->enterGame($roomId);
                    session(['room_id' => $roomId]);
                    #return view("game.room", ["room" => $room, "user" => $user]);
                    return redirect("/room");
                } else if ($room->host and $room->host == $user) {
                    # the host is valid and happened to be this user, then go to host dashboard
                    session(['room_id' => $roomId]);
                    return redirect("/dashboard/$roomId");
                } else {
                    # in any other cases, join the user into the game as an player
                    $user->enterGame($roomId);
                    session(['room_id' => $roomId]);
                    #return view("game.room", ["room" => $room, "user" => $user]);
                    return redirect("/room");
                }
            } else {
                return view("game.error", ["error" => "该房间不存在！"]);
            }
        }
        return view("game.error");
    }

    public function showRole(Request $request)
    {
        $u_id_session = session('user_id');
        if (!$u_id_session or !$user = User::find($u_id_session)) {
            return view("game.error", ["error" => "还未进入房间哦！"]);
        }
        if (!$room_id = $user->currRoomId()) {
            return view("game.error", ["error" => "还未进入房间哦！"]);
        }
        if (!$role_id = $user->currRollId($room_id)) {
            return view("game.error", ["error" => "主持人暂未分发身份牌！"]);
        }
        $role = Card::find($role_id);

        return view('game.role', ['role' => $role]);
    }

    public function room(Request $request)
    {

        $user = loginOrCreate();

        $room_id = $user->currRoomId();

        if ($room_id and $room = Game::find($room_id))
        {
            return view("game.room", ['room'=>$room, 'user'=>$user]);
        }else{
            return view("game.error", ["error" => "您还未进入房间!"]);
        }
    }
}
