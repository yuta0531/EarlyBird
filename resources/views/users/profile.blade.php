<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>plofile</title>
    </head>
    <body>
        <h1>早起き習慣アプリ -Early Bird-</h1>
        <h2>プロフィール＆フレンド</h2>
        
        <div>
            <p>ニックネーム：{{ Auth::user()->name }}</p>
            
        </div>
        <div>
            <p>次の目標の起床時間：</p>
            <input type="time">
        </div>
        <div>
            <p>フレンド <a href="/">追加</a></p>
            @foreach ($users as $user)
                    <p>{{ $user->name }}</p>
                    <br>
            @endforeach
        </div>
            <a href="/">Topへもどる</a>
        </div>
    </body>
</html>
