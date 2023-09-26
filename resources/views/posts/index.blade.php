<x-app-layout>
    <x-slot name="header">
        早起き習慣アプリ -Early Bird-
    </x-slot>
    <body>
        <h2>スタンプカード</h2>
        <div>
            <a href="/posts/create">今日のスタンプを押す</a>
        </div>
        <h2>今週の記録</h2>
        <div>
            @foreach ($posts as $post)
                    <p>日付：{{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('m/d') }}</p>
                    <p>今日の目標：<a href="/posts/{{ $post->id }}">{{ $post->today_goal }}</a></p>
                    <p>目標時間：{{\Carbon\Carbon::createFromTimeString($post->goal_time)->format('H:i') }}</p>
                    <p>起床時間：{{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('H:i') }}</p>
                    <br>
            @endforeach
        </div>
        <div>
            <a href="/posts/friend">フレンドの起きた時間</a>
        </div>
        <div>    
            <a href="/users/profile">デバック用＿全ユーザー</a>
        </div>
        <div>    
            <a href="/users/my_profile">プロフィール＆フレンド</a>
        </div>
        <div>
            ログインユーザー：{{ Auth::user()->name }}
        </div>
    </body>
</x-app-layout>