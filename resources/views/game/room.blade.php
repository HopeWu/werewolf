<x-master>
    <div>
        <h1>Room<span class="text-red-600 font-bold ml-1">{{$roomId}}</span></h1>
        <div>
            <form method="post"
                  action="/game/shuffle">
                <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                hover:shadow hover:bg-blue-600 focus-within:outline-none'
                        style="min-width:100px;"
                        type='submit'>
                    发身份牌
                </button >
            </form>
        </div>
    </div>
</x-master>
