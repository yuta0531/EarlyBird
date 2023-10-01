<x-app-layout>
    <x-slot name="header">
         早起き習慣アプリ -Early Bird-
    </x-slot>
    <body>
        <div class="h-screen w-screen flex justify-center">
           <div>
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                  <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><スタンプカード></h2>
            </div>        
        <form action="/posts" method="POST">
            @csrf
            <div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                日付：{{\Carbon\Carbon::today()->format('m/d')}}
                </h2>
                <br>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                今日の目標
                </h2>
                <textarea name="post[today_goal]" placeholder="ここはフレンドに共有されないよ" value="{{ old('post.today_goal') }}"></textarea>
                <br>
            </div>
            <div>
                <label for="myCheckbox">応援メッセージをChatGPTで生成する</label>
                <input type="checkbox" id="myCheckbox" name="myCheckbox">
                <p>(＊無料枠を使用しており、うまくいかない場合は無料枠を超えてしまっているので、チェックを外してください)</p>
                <br>
            </div>
            <div>
            <input type="submit" class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xl font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10" value="Good Morning!"/>
            </div>
        </form>
        
        <div>
            <br>
            <a href="/">Topへもどる</a>
        </div>
        </div>
        </div>
        </div>
        
        
    </body>
    </x-app-layout>