<x-app-layout>
    <x-slot name="header">
         早起き習慣アプリ -Early Bird-
    </x-slot>
    <body>
        <div>
            @foreach ($users as $user)
                    <p>
                    {{ $user->name }}
                    </p>
                    <div>
                    <form action="/users/{{ $user->id }}/follow" method="POST">
                        @csrf
                        <input type="submit" value="追加"/>
                    </form>
                    </div>
            @endforeach
        </div>
            <a href="/">Topへもどる</a>
        </div>
    </body>
</x-app-layout>
