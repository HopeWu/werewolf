<x-master>

    <div style="height: calc(100vh - 1.75rem);
            background-image: url({!! asset('images/bg2.jpeg') !!});
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display:  grid;
            grid-template-rows: repeat(10, 1fr);
            grid-template-columns: repeat(10, 1fr);
            ">
        <div class="container lg:mx-auto justify-center flex flex-col lg:max-w-xs"
             style="grid-row: 6/7; grid-column: 3/9; border: solid; border: #9561e2"
        >
            @if((! $room->host) or $room->host != $user)
                <h1>欢迎玩家<span class="text-red-600 font-bold ml-1 mr-3">{{$user->id}}</span>进入房间
                    <span class="text-red-600 font-bold ml-1">{{$room->id}}</span></h1>
                <div>
                    <a class="" href="/role">
                        <div class="rounded-lg hover:shadow hover:bg-blue-600
                mb-5 py-2 flex justify-center items-center"
                             style="height:100%; width: 100%; background: rgba(5, 17, 250, 0.5);">
                            <span style="color: white; font-size: 1.25rem; line-height: 1.75rem;">查看身份</span>
                        </div>
                    </a>
                    <form class=""
                          method="post"
                          action="/game/host"
                          >
                        @csrf
                        <input type="hidden" name="_roomId" value="{{$room->id}}">
                        <button class='rounded-lg hover:shadow hover:bg-blue-600
                mb-5 py-2 flex justify-center items-center'
                                style="height:100%; width: 100%; background: rgba(5, 17, 250, 0.5);"
                                type='submit'>
                            <span style="color: white; font-size: 1.25rem; line-height: 1.75rem;">主持游戏</span>
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>

</x-master>