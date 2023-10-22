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
                <a class="nav-link active" aria-current="page" href="/posts/friend">フレンド</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/users/my_profile">プロフィール</a>
              </li>
            </ul>
            <!-- End Header -->
            
            <div class="h-screen w-screen flex justify-center">
              <div>
                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                  <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><フレンドの起用時間></h2>
                </div>
      
                <!-- Table -->
                <div class="table-responsive">
                <table class="table text-nowrap table-striped">
                  <thead>
                    <tr>
                        <th class="px-4 py-2">日付</th>
                        <th class="px-4 py-2">起床</th>
                        <th class="px-4 py-2">ニックネーム</th>
                        <th class="px-4 py-2">詳細</th>
                    </tr>
                  </thead>
        
                  <tbody>
                  　@foreach ($friendPosts as $friendPost)
                      <tr>
                          <td class="border px-4 py-2" >{{\Carbon\Carbon::createFromTimeString($friendPost->get_up_time)->format('m/d') }}</td>
                          <!--目標時間と起床時間のどっちが早いかで色分け-->
                        @php
                            $goalTime = \Carbon\Carbon::parse($friendPost->goal_time);
                            $getUpTime = \Carbon\Carbon::parse($friendPost->get_up_time);
                        @endphp
                        
                        @if($goalTime->format('H:i') >= $getUpTime->format('H:i'))
                            <td class="border px-4 py-2 bg-info-subtle">
                        @else($goalTime->format('H:i') < $getUpTime->format('H:i'))
                            <td class="border px-4 py-2 bg-warning-subtle">
                        @endif
                              {{\Carbon\Carbon::createFromTimeString($friendPost->get_up_time)->format('H:i') }}
                              <div class="likes">
                                  @if($friendPost->is_liked_by_auth_user())
                                      <a href="/unlike/{{ $friendPost->id }}" class="btn btn-success btn-sm">いいね  <span>{{ $friendPost->likes->count() }}</span></a>
                                  @else
                                      <a href="/like/{{ $friendPost->id }}" class="btn btn-secondary btn-sm">いいね  <span>{{ $friendPost->likes->count() }}</span></a>
                                  @endif
                              </div>
                            </td>
                            <td class="border px-4 py-2">
                              <p>{{ $friendPost->user->name }}</p>
                            </td>
                            <td class="border px-4 py-2">
                              <a href="/posts/{{ $friendPost->id }}">
                                くわしく見る
                              </a>
                            </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                <!-- End Table -->
                
                <div class='paginate'>
                    {{ $friendPosts->links() }}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>