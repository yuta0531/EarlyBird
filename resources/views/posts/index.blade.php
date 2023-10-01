<x-app-layout>
    <x-slot name="header">
         早起き習慣アプリ -Early Bird-
    </x-slot>
    <body>
     <div class="h-screen w-screen flex justify-center">
      <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Header -->
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
          <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            <これまでの自分の記録>
          </h2>
        </div>
        <!-- End Header -->
    
        <!-- Table -->
        <table>
          <thead>
            <tr>
              <th class="px-4 py-2">日付</th>
              <th class="px-4 py-2">今日の目標</th>
              <th class="px-4 py-2">目標時間</th>
              <th class="px-4 py-2">起床時間</th>
            </tr>
          </thead>
    
          <tbody>
            @foreach ($posts as $post)
              <tr>
                <td class="border px-4 py-2">{{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('m/d') }}</td>
                <td class="border px-4 py-2"><a href="/posts/{{ $post->id }}">{{ $post->today_goal }}</a></td>
                <td class="border px-4 py-2">{{\Carbon\Carbon::createFromTimeString($post->goal_time)->format('H:i') }}</td>
                <td class="border px-4 py-2">{{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('H:i') }}</td>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <td class="border px-4 py-2">
                    <button type="button" onclick="deletePost({{ $post->id }})"> <button class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10">消去</button></button></td>
                </form>
              </tr>
            @endforeach
          </tbody>
        </table>
        <!-- End Table -->

        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
        <br>
        <p>リンク集</p>
        <div class="container mx-auto">
            <a href="/posts/create">・今日のスタンプを押す</a>
        </div>
        <div>
            <a href="/posts/friend">・フレンドの起きた時間</a>
        </div>
        <div>    
            <a href="/users/my_profile">・プロフィール＆フレンド</a>
        </div>
        <br>
        <div>
            ログインユーザー：{{ Auth::user()->name }}
        </div>
      </div> 
    </div> 
  </body>
</x-app-layout>