<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Вход</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @guest()
            <main class="py-4">
                <div class="container">
                    @yield('content', 'Default Content')
                </div>
            </main>
        @else
            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <span>{{ $title ?? '' }}</span>

                                    @auth
                                        <div class="dropdown show user-menu">
                                            <a id="dropdownMenuLink" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ Auth::user()->email }} <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="dropdownMenuLink">
{{--                                                <li class="nav-item">--}}
{{--                                                    <a href="{{ route('home') }}" class="dropdown-item">Личный кабинет</a>--}}
{{--                                                    <a href="{{ route('details.index') }}" class="dropdown-item">Личные данные</a>--}}
{{--                                                    <a href="{{ route('documents.index') }}" class="dropdown-item">Документы</a>--}}
{{--                                                    <a href="{{ route('deals.index') }}" class="dropdown-item">Сделки</a>--}}
{{--                                                </li>--}}
                                                <li class="nav-item">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        Выход
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endauth
                                </div>
                                <div class="card-body">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        @endguest

    </div>

    <style>
        .image_edit img {
            width: 100px;
            height: auto;
        }
        #img_change {
            outline: none;
            border: none;
            cursor: pointer;
            background-color: transparent;
            margin-bottom: 10px;
        }

    </style>

    <script>
        $(function () {
            $('#img_change').click(function () {
                var imageEdit = $('.image_edit');

                if (imageEdit.children('#image').length === 0) {
                    imageEdit.append('<input type="file" id="image" name="image">');
                }

                $('#image').change(function () {
                    var reader = new FileReader();
                    reader.addEventListener('load', function (e) {
                        $('#img_change img').attr('src', e.target.result);
                    });
                    reader.readAsDataURL($('#image').prop('files')[0]);
                });
            });
        });
    </script>
</body>
</html>
