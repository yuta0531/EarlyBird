<x-app-layout>
    <x-slot name="header">
        早起き習慣アプリ -Early Bird-
    </x-slot>
    <body>
        <h1>早起き習慣アプリ -Early Bird-</h1>
        <h2>フレンド検索結果</h2>
        <div>
            @foreach ($users as $user)
                    <p>
                    {{ $user->name }}
                    </p>
                    <div>
                        @if (DB::table('follows')->where('following_id', Auth::id())->where('followed_id', $user->id)->exists())
                            <p>フレンド登録済み</p>
                        @else
                            <form action="/users/{{ $user->id }}/follow" method="POST">
                            @csrf
                                <input type="submit" value="追加"/>
                            </form>
                        @endif
                    </div>
            @endforeach
        </div>
            <a href="/">Topへもどる</a>
        </div>
    </body>
</x-app-layout>
