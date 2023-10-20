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
                    <a class="nav-link bg-danger link-warning" href="/users/my_profile">プロフィール</a>
                  </li>
                </ul>
                
                <br>
                
                <div class="card">
                  <div class="card-body">
                    EarlyBirdへようこそ！ ーEarlyBirdとは「早起きする人」、早起きしてやりたいことができる人生を目指しましょう！
                  </div>
                </div>
                
                <br>
                
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                {{ __("初めての方は上にあるプロフィールをクリックして、目標の起床時間を設定してね！") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
