<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>index</title>
    </head>
    <body>
        <h1>早起き習慣アプリ -Early Bird-</h1>
        
        <h2>スタンプカード</h2>
        <div>
            <a href="/posts/create">今日のスタンプを押す</a>
        </div>
        <div>
            @foreach ($posts as $post)
                    <p>日付：</p>
                    <p>スタンプ</p>
                    <br>
            @endforeach
        </div>
        <br>
        <h2>今週の記録</h2>
        <div>
            @foreach ($posts as $post)
                    <p>日付：<a href="/posts/{{ $post->id }}">{{ $post->get_up_time }}</a></p>
                    <p>今日の目標：<a href="/posts/{{ $post->id }}">{{ $post->today_goal }}</a></p>
                    <p>目標時間：<a href="/posts/{{ $post->id }}">{{ $post->goal_time }}</a></p>
                    <p>起床時間：<a href="/posts/{{ $post->id }}">{{ $post->get_up_time }}</a></p>
                    <br>
            @endforeach
        </div>
        <div>
            <a href="/posts/friend">フレンドの起きた時間</a>
        </div>
        <div>    
            <a href="/users/profile">プロフィール＆フレンド</a>
        </div>
        <div>
            ログインユーザー：{{ Auth::user()->name }}
        </div>
    </body>
</html>