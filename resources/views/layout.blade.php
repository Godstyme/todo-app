<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ 'assets/css/bootstrap.min.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/css/all.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/css/fontawesome.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/css/brands.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/css/solid.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/style.css' }}">
    <link rel="shortcut icon" href="{{ 'assets/imgs/todo.png' }}" type="image/x-icon">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <a class="navbar-brand text-primary fw-bolder" href="">TODO TASK</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="registration">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('login') }}">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
    <div>
        @yield('content')
    </div>

    <script src="{{ 'assets/js/jquery-3.6.0.min.js' }}"></script>
   <script src="{{ 'assets/js/bootstrap.min.js' }}"></script>
</body>
</html>
