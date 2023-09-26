<x-app-layout>
    <x-slot name="header">
         早起き習慣アプリ -Early Bird-
    </x-slot>
    <body>
        <h1>早起き習慣アプリ -Early Bird-</h1>
        
        <h2>フレンドの起用時間</h2>
        <div>
            @foreach ($friendPosts as $friendPost)
                <div>
                    <p><a href="/users/{{ $friendPost->user_id }}">ニックネーム:{{ $friendPost->user->name }}</a></p>
                    <p>日付：{{\Carbon\Carbon::createFromTimeString($friendPost->get_up_time)->format('m/d') }}</p>
                    <p>目標時間：{{\Carbon\Carbon::createFromTimeString($friendPost->goal_time)->format('H:i') }}</p>
                    <p>起床時間：{{\Carbon\Carbon::createFromTimeString($friendPost->get_up_time)->format('H:i') }}</p>
                    <br>
                </div>
            @endforeach
        </div>
        {{ Auth::user()->name }}
        
        <a href="/">Topへもどる</a>
    </body>
</x-app-layout>