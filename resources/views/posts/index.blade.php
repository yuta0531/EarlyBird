<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>早起き習慣アプリ -Early Bird-</h1>
        
        <h2>スタンプカード</h2>
        <a href='/posts/create'>新規投稿</a>
        <div>
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>
                        タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </p>
                    <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                </div>
            @endforeach
        </div>
        <h2>今週の記録</h2>
        <div>
            <!--今週の記録-->
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>日付：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a></p>
                    <p>今日の目標：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                    <p>目標時間：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a></p>
                    <p>起床時間：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a></p>
                </div>
            @endforeach    
        </div>
        
        <div>
            {{ $posts->links() }}
        </div>
    </body>
</html>
