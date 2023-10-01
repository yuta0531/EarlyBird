<x-app-layout>
    <x-slot name="header">
         早起き習慣アプリ -Early Bird-
    </x-slot>
    <body>
        <div class="h-screen w-screen flex justify-center">
        <div>
            <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><フレンドの起用時間</h2>
             </div>
            <!-- End Header -->
    
            <!-- Table -->
            <table>
                <thead>
                    <tr>
                        <th class="px-4 py-2">日付</th>
                        <th class="px-4 py-2">目標時間</th>
                        <th class="px-4 py-2">起床時間</th>
                        <th class="px-4 py-2">ニックネーム</th>
                    </tr>
                </thead>
    
                <tbody>
                   @foreach ($friendPosts as $friendPost)
                    <tr>
                        <td class="border px-4 py-2">{{\Carbon\Carbon::createFromTimeString($friendPost->get_up_time)->format('m/d') }}</a></td>
                        <td class="border px-4 py-2">{{\Carbon\Carbon::createFromTimeString($friendPost->goal_time)->format('H:i') }}</td>
                        <td class="border px-4 py-2">{{\Carbon\Carbon::createFromTimeString($friendPost->get_up_time)->format('H:i') }}</td>
                        <td class="border px-4 py-2">{{ $friendPost->user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table -->
        <br>
        <a href="/">Topへもどる</a>
        </div>
        </div>
    </body>
</x-app-layout>