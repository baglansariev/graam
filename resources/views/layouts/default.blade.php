<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="yandex-verification" content="c2e6180560bd2d69" />
    <title>{{ $title ?? 'GRAAM' }}</title>
    <link rel="shortcut icon" href="{{ asset('images/template/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/feedback-form.css') }}">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('font-awesome/js/all.min.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/inputmask.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @if (request()->getHost() == 'graam.ru')
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(66766309, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });

    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/66766309" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    @endif
</head>

<body>
    <main id="main" class="gold585">
        <header class="head">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-between">
                        <div class="header-logo">
                            <a href="/" class="main-logo d-flex justify-content-center align-items-center flex-column">
                                <p class="logo-title"><span>G</span>RAAM</p>
                                <p class="logo-subtitle text-center" style="line-height: 1.1">Один грамм, <br> много возможностей</p>
                            </a>
                        </div>
                        <div class="header-actions text-right p-4">
                            @guest
                            <a href="{{ route('login') }}" class="login-btn">Войти</a>
                            @endguest
                            @auth
                            @if (isset(Auth::user()->name) && Auth::user()->name !== '')
                            <a href="{{ route('personal-info') }}" class="login-btn">{{ explode(' ', Auth::user()->name)[0] }}</a>
                            @elseif(isset(Auth::user()->detailsFromCrm()->name) && Auth::user()->detailsFromCrm()->name !== '')
                            <a href="{{ route('personal-info') }}" class="login-btn">{{ explode(' ', Auth::user()->detailsFromCrm()->name)[0] }}</a>
                            @else
                            <a href="{{ route('personal-info') }}" class="login-btn">Кабинет</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content', 'Default Content')

    </main>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/feedback-form.js') }}"></script>
    
</body>

</html>
