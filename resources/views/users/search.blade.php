<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <title>早起き習慣アプリ -Early Bird-</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <!--Header-->
        <ul class="nav nav-tabs justify-content-center bg-info col-12 col-md-12">
          <li class="nav-item">
            <a class="nav-link" href="/">TOP</a>
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
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><フレンド検索結果></h2>
            </div> 
            
            <div>
              @foreach ($users as $user)
                <h3>
                  @if (DB::table('follows')->where('following_id', Auth::id())->where('followed_id', $user->id)->exists())
                    <h3>{{ $user->name }}:フレンド登録済み</h3>
                    <br>
                  @else
                    <form action="/users/{{ $user->id }}/follow" method="POST">
                    @csrf
                      {{ $user->name }}
                      <input type="submit" class="btn btn-primary" value="追加"/>
                    </form>
                    <br>
                  @endif
                </h3>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>
