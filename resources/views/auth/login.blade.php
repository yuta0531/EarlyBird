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
            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <!-- Email Address -->
                <div>
                    <x-input-label class="form-label" for="email" :value="__('メールアドレス')" /><br>
                    <x-text-input class="form-control" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('パスワード')" /><br>
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
        
                    <x-primary-button class="ml-3 bg-info">
                        {{ __('ログイン') }}
                    </x-primary-button>
                </div>
            </form>
             <br>
            <a href="/register">新規登録</a>
        </div>
    </div>
    </div>
</body>
</html>
