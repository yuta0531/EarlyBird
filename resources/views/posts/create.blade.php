<x-app-layout>
    <x-slot name="header">
         早起き習慣アプリ -Early Bird-
    </x-slot>
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
                <input type="text" name="post[today_goal]" placeholder="ここはフレンドに共有されないよ" value="{{ old('post.today_goal') }}"/>
            </div>
            <input type="submit" value="Good Morning!"/>
        </form>
    </body>
</x-app-layout>