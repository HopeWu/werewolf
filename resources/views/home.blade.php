<x-master>

    <div style="height: calc(100vh - 1.75rem);
            background-image: url({!! asset('images/u=304344891,2514493180&fm=26&gp=0.jpeg') !!});
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display: grid;
            grid-template-rows: repeat(10, 1fr);
            grid-template-columns: repeat(10, 1fr);
            ">
        <div class="container lg:mx-auto justify-center flex flex-col lg:max-w-xs"
             style="grid-row: 6/7; grid-column: 3/9; border: solid; border: #9561e2"
        >
            <div>
                <a class="" href="/game/create">
                    <div class="rounded-lg hover:shadow hover:bg-blue-600
                mb-5 py-2 flex justify-center items-center"
                         style="height:100%; width: 100%; background: rgba(5, 17, 250, 0.5);">
                        <span style="color: white; font-size: 1.25rem; line-height: 1.75rem;">建房</span>
                    </div>
                </a>
                <form class="flex flex-row justify-between bg-gray-200 rounded-lg"
                      method="post"
                      action="/game/enter"
                      style="height:100%; width: 100%; background: rgba(255, 255, 255, 0.5);">
                    @csrf
                    <input class="w-full focus-within:outline-none px-2"
                           type="number" name="roomId" placeholder="请输入房间号"
                           required
                           style="background: rgba(255, 255, 255, 0.5);">
                    <button class='rounded-md py-2 px-4 text-white
                hover:shadow hover:bg-blue-600 focus-within:outline-none'
                            style="min-width:100px; background: rgba(5, 17, 250, 0.5);"
                            type='submit'>
                        <span style="color: white;">进入房间</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-master>