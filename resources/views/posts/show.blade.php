<x-app-layout>
    <x-slot name="header">
         早起き習慣アプリ -Early Bird-
    </x-slot>
    <body>
        <div class="h-screen w-screen flex justify-center">
        <div> 
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><スタンプカード(確認画面)></h2>
            </div>
        
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
        <div>
            <p>日付：{{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('m/d') }}</p>
            <br>
        </div>
        <div>
            <p>目標時間：{{\Carbon\Carbon::createFromTimeString($post->goal_time)->format('H:i') }}</p>
            <br>
        </div>
        <div>
            <p>起床時間：{{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('H:i') }}</p>
            <br>
        </div>
        <div>
            <p>今日の目標：{{ $post->today_goal }}</p>
            <br>
        </div>
        <div>
            <p>応援コメント：{{ $post->yell }}</p>
            <br>
        </div>
        </h2>
        
        <div>
            <a href="/">Topへもどる</a>
        </div>
    </body>
</x-app-layout>
