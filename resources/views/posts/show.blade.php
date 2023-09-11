<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>早起き習慣アプリ -Early Bird-</h1>
        <h2>スタンプカード(確認画面)</h2>
        <div>
            <p>日付：{{ $post->title }}</p>
            <p>今日の目標：{{ $post->body }}</p>
            <p>応援コメント：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
        </div>
        <div>
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
            <a href="/">Topへもどる</a>
        </div>
        <div>
            @if($post->stamp_date)
                <p>スタンプが押された日付: {{ $post->stamp_date }}</p>
            @else
                <p>まだスタンプが押されていません。</p>
            @endif
        </div>
</html>
