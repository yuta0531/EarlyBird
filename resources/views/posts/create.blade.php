<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>早起き習慣アプリ -Early Bird-</h1>
        <h2>スタンプカード</h2>
        <form action="/posts" method="POST">
            @csrf
            <div>
                <p>日付：{{\Carbon\Carbon::today()->format('m/d')}}</p>
            </div>
            <div>
                <h2>今日の目標</h2>
                <input type="text" name="post[today_goal]" placeholder="今日の目標" value="{{ old('post.today_goal') }}"/>>
            </div>
            <div>
                <h2>yell仮</h2>
                <input type="text" name="post[yell]" placeholder="yellsss" value="{{ old('post.yell') }}"/>
            </div>
            <div>
                <h2>目標時間（カリ）</h2>
                <input type="time" name="post[goal_time]" value="{{ old('post.goal_time') }}"/>
            </div>
            <input type="submit" value="Good Morning!"/>
        </form>
    </body>
</html>
