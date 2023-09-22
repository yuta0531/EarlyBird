<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>早起き習慣アプリ -Early Bird-</h1>
        <h2>スタンプカード(目標変更)</h2>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <p>日付：{{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('m/d') }}</p>
                </div>
                <div>
                    <p>起床時間：{{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('H:i') }}</p>
                </div>
                <div>
                    <p>今日の目標</p>
                    <input type='text' name='post[today_goal]' value="{{ $post->today_goal }}">
                </div>
                <input type="submit" value="変更完了">
            </form>
        </div>
    </body>
</html>
