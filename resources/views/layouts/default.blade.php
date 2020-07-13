<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? 'GRAAM' }}</title>
        <link rel="shortcut icon" href="{{ asset('images/template/favicon.ico') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('font-awesome/js/all.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </head>
    <body>
        <main id="main" class="gold">
            <header>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="/" class="main-logo d-flex justify-content-star align-items-center">
                                <img class="logo-img" src="{{ asset('images/graam_logo.png') }}" alt="">
                                <p>GRAAM</p>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            @yield('content', 'Default Content')
        </main>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>