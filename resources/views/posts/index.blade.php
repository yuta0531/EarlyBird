<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <title>早起き習慣アプリ -Early Bird-</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body class="bg-info-subtle">
    <br>
    <div class="container">
      <div class="card">
        <h5 class="card-header">EarlyBird</h5>
          <div class="card-body">
            <div class="row">
              <!--Header-->
                <ul class="nav nav-tabs justify-content-center bg-info-subtle col-12 col-md-12">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">TOP</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/posts/create">スタンプON</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/posts/friend">フレンド</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/users/my_profile">プロフィール</a>
                  </li>
                </ul>
              <!--End Header-->
              
              <div class="h-screen w-screen flex justify-center">
                <div>
                  <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><自分の記録></h2>
                  </div>
                  
                <!-- Table -->
                <div class="table-responsive">
                <table class="table text-nowrap table-striped" style="width: 100%">
                  <thead>
                    <tr>
                      <th class="px-4 py-2" style="width: 5%">日付</th>
                      <th class="px-4 py-2" style="width: 10%">目標</th>
                      <th class="px-4 py-2" style="width: 10%">起床</th>
                      <th class="px-4 py-2" style="width: 70%">今日の目標</th>
                    </tr>
                  </thead>
              
                  <tbody>
                    @foreach ($posts as $post)
                      <tr>
                        <td class="border px-4 py-2">{{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('m/d') }}</td>
                        <td class="border px-4 py-2">{{\Carbon\Carbon::createFromTimeString($post->goal_time)->format('H:i') }}</td>
                        <!--目標時間と起床時間のどっちが早いかで色分け-->
                          @php
                              $goalTime = \Carbon\Carbon::parse($post->goal_time);
                              $getUpTime = \Carbon\Carbon::parse($post->get_up_time);
                          @endphp
                          
                          @if($goalTime->format('H:i') >= $getUpTime->format('H:i'))
                              <td class="border px-4 py-2 bg-info-subtle">
                          @else($goalTime->format('H:i') < $getUpTime->format('H:i'))
                              <td class="border px-4 py-2 bg-warning-subtle">
                          @endif
                              {{\Carbon\Carbon::createFromTimeString($post->get_up_time)->format('H:i') }}</td>
                        <td class="border px-4 py-2"><a href="/posts/{{ $post->id }}">{{ $post->today_goal }}</a></td>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <td class="border px-4 py-2">
                            <button class="btn btn-danger">消去</button></td>
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                <!-- End Table -->
        
                <div class='paginate'>
                    {{ $posts->links() }}
                </div>
                
                <br>
                <p>リンク集</p>
                <div>
                  <a href="/posts/create">・今日のスタンプを押す (スタンプON)</a>
                </div>
                <div>
                  <a href="/posts/friend">・フレンドの起きた時間 (フレンド)</a>
                </div>
                <div>    
                  <a href="/users/my_profile">・プロフィール＆フレンド追加 (プロフィール)</a>
                </div>
                <br>
                <div>
                    ログインユーザー：{{ Auth::user()->name }}
                </div>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('ログアウト') }}
                      </a>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>