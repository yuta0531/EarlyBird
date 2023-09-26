<x-app-layout>
    <x-slot name="header">
         早起き習慣アプリ -Early Bird-
    </x-slot>
    <body>
        <h1>早起き習慣アプリ -Early Bird-</h1>
        <h2>プロフィール＆フレンド</h2>
        
        <div>
            <p>ニックネーム：{{ Auth::user()->name }}</p>
            
        </div>
        <div>
            <p>現在の目標の起床時間：{{\Carbon\Carbon::createFromTimeString( Auth::user()->goal_time )->format('H:i') }}</p>
        </div>
        <div>
            <p>目標の起床時間を変更する：</p>
            <form action="/users/goal_time_set/{{ Auth::user()->id }}" method="POST">
                @csrf
                @method('PUT')
                <input type="time" name="my_id[goal_time]" value="{{ old('my_id.goal_time') }}"/>
                <input type="submit" value="変更完了">
            </form>
        </div>
        <div>
            <br>
            <p>フレンド
                <form action="/users/search" method="GET">
                    @csrf
                    <input type="text" name="nickname">
                    <input type="submit" value="検索">
                </form>
            </p>
            @foreach ($follows as $follow)
                    <p>
                    {{ $follow->name }}
                    </p>
                    <form action="{{ route("unfollow",["followed_id"=>$follow->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="buttun">消去</button>
                    </form>
            @endforeach
        </div>
            <a href="/">Topへもどる</a>
        </div>
    </body>
</x-app-layout>
