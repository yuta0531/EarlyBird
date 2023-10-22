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
                <a class="nav-link" href="/posts/create">スタンプON</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/posts/friend">フレンド</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/users/my_profile">プロフィール</a>
              </li>
            </ul>
            <!--End Header-->
            <div class="h-screen w-screen flex justify-center">
              <div>
                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                  <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><プロフィール＆フレンド></h2>
                </div>
      
                <div>
                  <h5>
                  ・自分のニックネーム：{{ Auth::user()->name }}
                  </h5>
                  <br>
                </div>
                
                <div>
                  <h5>
                  <form action="/users/goal_time_set/{{ Auth::user()->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    ・現在の目標の起床時間：{{\Carbon\Carbon::createFromTimeString( Auth::user()->goal_time )->format('H:i') }}
                    <input type="time" name="my_id[goal_time]" value="{{ old('my_id.goal_time') }}"/>
                    <input type="submit" class="btn btn-primary" value="変更する">
                    </form>
                  </h5>
                  <br>
                </div>
                
                <div>
                  <h5>
                    <form action="/users/search" method="GET">
                      @csrf
                      ・フレンド追加
                      <input type="text" class="form-control" name="nickname">
                      <input type="submit" class="btn btn-primary" value="検索">
                    </form>
                  </h5>
                  <br>
                </div>  
         
                <div>
                  <h5>
                  ・フレンドリスト
                  </h5>
                  <table>
                    <tbody>
                      @foreach ($follows as $follow)
                      <tr>
                        <td class="border px-4 py-2"> {{ $follow->name }}</td>
                        <td class="border px-4 py-2">
                          <form action="{{ route('unfollow', ['user' => $follow->id]) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <input type="hidden" name="followed_id" value="{{ $follow->id }}">
                          <button type="buttun" class="btn btn-danger">消去</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
  
                <br>
                
                <div>
                  <h5>・あなたをフォローしている人</h5>
                  <table>
                      <tbody>
                        @foreach ($followeds as $followed)
                          <tr>
                            <td class="border px-4 py-2">{{ $followed->name }}</td>
                            @if ($followed->followed->contains(Auth::user()))
                              <td class="border px-4 py-2">登録済み</td>
                            @else
                              <td class="border px-4 py-2">
                                <form action="{{ route('follow', ['user' => $followed->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="followed_id" value="{{ $followed->id }}">
                                <button type="buttun" class="btn btn-primary">追加</button>
                                </form>
                              </td>
                            @endif
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
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