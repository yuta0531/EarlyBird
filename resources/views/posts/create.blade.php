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
                              <a class="nav-link" href="/">TOP</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="/posts/create">スタンプ</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="/posts/friend">フレンド</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="/users/my_profile">設定</a>
                            </li>
                        </ul>
                        <!-- End Header -->
                        <div class="h-screen w-screen flex justify-center">
                            <div>
                                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200"><スタンプ></h2>
                                </div>
                                
                            　　<form action="/posts" method="POST">
                                    @csrf
                                    <div>
                                        <h3>
                                        日付：{{\Carbon\Carbon::today()->format('m/d')}}
                                        </h3>
                                        <br>
                                    </div>
                                    <div>
                                        <h3>
                                        今日の目標
                                        </h3>
                                        <textarea class="form-control" id="FormControlTextarea1" rows="3" name="post[today_goal]" placeholder="ここに今日の目標を記入して">{{ old('post.today_goal') }}</textarea>
                                        <p class="today_goal__error" style="color:red">今日の目標は1文字以上30文字以下で入力してください！</p>
                                        <br>
                                    </div>
                                    <div>
                                        <label for="myCheckbox"><s>応援メッセージをChatGPTで生成する</s></label>
                                    <!--ChatGPTの無料枠を超えてしまったため、コメントアウト　-->
                                    <!--    <input type="checkbox" id="myCheckbox" name="myCheckbox"> -->
                                        <p><s>(＊無料枠を使用しており、うまくいかない場合は無料枠を超えてしまっているので、チェックを外してください)</s></p>
                                        <p>＊ChatGPTの無料枠を超えてしまい、現在ChatGPTの応援メッセージはご利用いただけません</p>
                                        <br>
                                    </div>
                                    <div>
                                        <input type="submit" class="btn btn-warning" value="Good Morning!"/>
                                    </div>
                                </form>
                            
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