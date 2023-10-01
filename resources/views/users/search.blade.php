<x-app-layout>
    <x-slot name="header">
        早起き習慣アプリ -Early Bird-
    </x-slot>
    <body>
        <div class="h-screen w-screen flex justify-center">
        <div> 
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><フレンド検索結果></h2>
            </div> 
            
            <div>
                @foreach ($users as $user)
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        @if (DB::table('follows')->where('following_id', Auth::id())->where('followed_id', $user->id)->exists())
                            <p>{{ $user->name }}:フレンド登録済み</p>
                            <br>
                        @else
                            <form action="/users/{{ $user->id }}/follow" method="POST">
                            @csrf
                            {{ $user->name }}
                            <input type="submit" class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xl font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10" value="追加"/>
                            </form>
                            <br>
                        @endif
                    </h2>
                @endforeach
            </div>
            
            <br>
            <a href="/">Topへもどる</a>
        </div>
        </div>
    </body>
</x-app-layout>
