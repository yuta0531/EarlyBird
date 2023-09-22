<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}/stampon" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>今日の目標</h2>
                    <input type='text' name='post[today_goal]' value="{{ $post->today_goal }}">
                    
                </div>
                <input type="submit" value="Good Morning">

            </form>
        </div>
        <a href="/">Topへもどる</a>
    </body>
</html>
