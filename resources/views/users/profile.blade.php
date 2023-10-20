<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" >
    </head>
    
    <body>
    <div class="container">
    <div class="card">
      <h5 class="card-header">EarlyBird</h5>
        <div class="card-body">
          <ul class="nav nav-tabs justify-content-center bg-info">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
        <div class="mx-auto p-2" style="width: 200px;">
        <div>
            @foreach ($users as $user)
                    <p>
                    {{ $user->name }}
                    </p>
                    <div>
                    <form action="/users/{{ $user->id }}/follow" method="POST">
                        @csrf
                        <input type="submit" value="追加"/>
                    </form>
                    </div>
            @endforeach
        </div>
            <a href="/">Topへもどる</a>
        </div>


</div>
</div>
</div>

    </body>
</html>
