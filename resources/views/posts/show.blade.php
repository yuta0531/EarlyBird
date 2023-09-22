<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>show</title>
    </head>
    <body>
        <h1>早起き習慣アプリ -Early Bird-</h1>
        <h2>スタンプカード(確認画面)</h2>
        <div>
            <p>日付：{{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('m/d') }}</p>
        </div>
        <div>
            <p>起床時間：{{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('H:i') }}</p>
        </div>
        <div>
            <p>今日の目標：{{ $post->today_goal }}</p>
        </div>
        <div>
            <p>応援コメント：</p>
        </div>
        <div>
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">今日の目標変更</a>]</p>
            <a href="/">Topへもどる</a>
        </div>
    </body>
</html>
