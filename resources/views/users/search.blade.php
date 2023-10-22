<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <title>早起き習慣アプリ -Early Bird-</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body class="bg-info-subtle">
    <div class="container">
      <div class="card">
        <h5 class="card-header">EarlyBird</h5>
        <div class="card-body">
          <div class="row">
            <!--Header-->
            <ul class="nav nav-tabs justify-content-center bg-info-subtle col-12 col-md-12">
              <li class="nav-item">
                <a class="nav-link" href="/">TOP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/posts/create">スタンプ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/posts/friend">フレンド</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/users/my_profile">設定</a>
              </li>
            </ul>
            <!--End Header-->
            <div class="h-screen w-screen flex justify-center">
              <div>
                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                  <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><プロフィール＆フレンド></h2>
                </div>
                
                <div>
                  @foreach ($users as $user)
                    <h5>
                      @if (DB::table('follows')->where('following_id', Auth::id())->where('followed_id', $user->id)->exists())
                        <h5>{{ $user->name }}:フレンド登録済み</h5>
                        <br>
                      @else
                        <form action="/users/{{ $user->id }}/follow" method="POST">
                        @csrf
                          {{ $user->name }}
                          <input type="submit" class="btn btn-primary" value="追加"/>
                        </form>
                        <br>
                      @endif
                    </h5>
                  @endforeach
                </div>
                
                <div>
                <br>
                <a href="/">Topへもどる</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>
