<x-app-layout>
    <x-slot name="header">
         早起き習慣アプリ -Early Bird-
    </x-slot>
    <body>
      <div class="h-screen w-screen flex justify-center">
      <div>
        <!-- Header -->
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
          <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><プロフィール＆フレンド></h2>
        </div>
        <!-- End Header -->

        <div class="mt-2.5">
          <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
          ・自分のニックネーム：{{ Auth::user()->name }}
          </h2>
          <br>
        </div>
        
        <div>
          <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
          <form action="/users/goal_time_set/{{ Auth::user()->id }}" method="POST">
            @csrf
            @method('PUT')
            ・現在の目標の起床時間：{{\Carbon\Carbon::createFromTimeString( Auth::user()->goal_time )->format('H:i') }}→
            <input type="time" name="my_id[goal_time]" value="{{ old('my_id.goal_time') }}"/>
            <input type="submit" class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xl font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10" value="変更する">
            </form>
          </h2>
          <br>
        </div>
        
        <div>
          <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            <form action="/users/search" method="GET">
              @csrf
              ・フレンド追加
              <input type="text" name="nickname">
              <input type="submit" class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xl font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10" value="検索">
            </form>
          </h2>
          <br>
        </div>  
 
        <div>
          <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
          ・フレンドリスト
          </h2>
          <table>
            <tbody>
              @foreach ($follows as $follow)
              <tr>
                <td class="border px-4 py-2"> {{ $follow->name }}
                <td class="border px-4 py-2">
                  <button type="buttun" class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10">消去</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
        <br>
        <a href="/">Topへもどる</a>

      </div>
    </div>
  </body>
</x-app-layout>
