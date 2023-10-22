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
                              <a class="nav-link" aria-current="page" href="/">TOP</a>
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
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><詳細画面></h2>
                                </div>
                
                                <h5>
                                    <div>
                                        <p>ユーザー：{{ Auth::user()->name }}</p>
                                        <br>
                                    </div>
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
                                        <label for="exampleInputEmail1" class="form-label">今日の目標</label>
                                        <textarea class="form-control bg-light" type="text" placeholder="{{ $post->today_goal }}" disabled></textarea>
                                        <br>
                                    </div>
                                    <div>
                                        <p>応援コメント：{{ $post->yell }}</p>
                                        <br>
                                    </div>
                                </h5>
                                
                                <div class="likes">
                                    @if($post->is_liked_by_auth_user())
                                        <a href="/unlike/{{ $post->id }}" class="btn btn-success btn-sm">いいね  <span>{{ $post->likes->count() }}</span></a>
                                    @else
                                        <a href="/like/{{ $post->id }}" class="btn btn-secondary btn-sm">いいね  <span>{{ $post->likes->count() }}</span></a>
                                    @endif
                                </div>
                                
                                <br>
                                
                                <div class="input_comment">
                                    <form action="/posts/comment" method="POST">
                                        @csrf
                                        <input type="hidden" name="comment[user_id]" value="{{Auth::id()}}">
                                        <input type="hidden" name="comment[post_id]" value="{{$post->id}}">
                                        <label for="comment" class="form-label"></label>
                                        <textarea id="comment" class="form-textarea" name="comment[body]" placeholder="コメントを入力してください" value="{{old('comment.body')}}" required></textarea>
                                        <input type="submit" class="form-submit" value="投稿"/>
                                    </form>
                                </div>
                                
                                
                                <br>
                                
                                <div class="comments">
                                    @foreach($post->comments as $comment)
                                    <div>
                                        <div>
                                            <p>
                                                {{$comment->user->name}} : 
                                                {{$comment->body}}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                                <br>
                
                                <div>
                                    <a href="/">Topへもどる</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
