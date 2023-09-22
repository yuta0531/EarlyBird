<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>早起き習慣アプリ -Early Bird-</h1>
        
        <h2>フレンドの起用時間</h2>
        <div>
            @foreach ($posts as $post)
                <div>
                    <p>ニックネーム：
                    <p>目標時間：<a href="/posts/{{ $post->id }}">{{ $post->goal_time }}</a></p>
                    <p>起床時間：<a href="/posts/{{ $post->id }}">{{ $post->get_up_time }}</a></p>
                </div>
            @endforeach
        </div>
        {{ Auth::user()->name }}
        
        <a href="/">Topへもどる</a>
    </body>
</html>
