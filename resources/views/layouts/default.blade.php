<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="yandex-verification" content="c2e6180560bd2d69" />
    <title>{{ $title ?? 'ГРААМ' }}</title>
    <link rel="shortcut icon" href="{{ asset('images/template/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}?<?=time();?>">
    <link rel="stylesheet" href="{{ asset('css/feedback-form.css') }}?<?=time();?>">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.coockie.js') }}"></script>
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

    <script>
        let video;
        window.onload = function() {
            video = document.getElementById("main-video");
            playBtn = document.getElementsByClassName("play-btn");
        };

        function play() {
            video.play();
        }

        function pause() {
            video.pause();
        }

        function stop() {
            video.pause();
            video.currentTime = 0;
        }

    </script>
</head>

<body>
    <main id="main" class="gold585 home-content">
        <div class="sticky-header">
            <div class="sticky-header-container">
                <div class="container-fluid">
                    <div class="row content-row">
                        <div class="col-sm-4 col-6 d-flex justify-content-start">
                            <div class="sticky-header-logo">
                                <a href="/" class="sticky-logo d-flex justify-content-center align-items-center flex-column">
                                    <img src="{{ asset('images/graam_rus_black.png') }}" class="img_sticky_logo" alt="">
{{--                                    <p class="logo-title"><span>G</span><i>RAAM</i></p>--}}
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 params-head d-flex align-items-center justify-content-center">
                            @component('modules.params_block')@endcomponent
                        </div>
                        <div class="col-sm-4 col-6 d-flex align-items-center justify-content-end">
                            <div class="header-actions text-right">
                                @guest
                                    <a href="{{ route('login') }}" class="login-btn">Вход</a>
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
            </div>
        </div>
        <header class="head">
            <div class="header-container">
                <div class="container-fluid">
                    <div class="row content-row">
                        <div class="col-md-4 d-md-flex d-none align-items-center justify-content-start col-currency">
                            <div class="head-currencies">
                                <div class="currency-block d-flex flex-column">
                                    <ul class="currencies">
                                        <li class="dollar">
                                            <span><!--<i class="fas fa-sort-up"></i>--> {{ $currency['USD']['Value'] }}</span>
                                            <span>$ USD</span>
                                        </li>
                                        <li class="gold">
                                            <span><!--<i class="fas fa-sort-up"></i>--></span>
                                            <span>золото</span>
                                        </li>
                                    </ul>
                                    <p class="note">
                                        курсы актуальны на {{ date('d.m.Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-6 d-flex justify-content-center align-items-center">

                            <div class="header-logo">
                                <a href="/" class="main-logo justify-content-center align-items-center flex-column">
{{--                                    <p class="logo-title"><span>G</span>RAAM</p>--}}
                                    <img src="{{ asset('images/graam_rus_white.png') }}" class="img_front_logo" alt="">
                                    <p class="logo-subtitle text-center"><span>Один грамм,</span> <span>много возможностей</span></p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-6 d-flex justify-content-end align-items-center">
                            <div class="header-actions text-right">
                                @guest
                                    <a href="{{ route('login') }}" class="login-btn">Вход</a>
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
            </div>
        </header>
        @yield('content', 'Default Content')
       
    </main>
    <div id="coo-popup">
    <div class="popup">
        <p>Этот сайт использует файлы cookies для обеспечения работоспособности и улучшения качества обслуживания. Продолжая использовать наш сайт, вы автоматически соглашаетесь с использованием данных технологий.</p>
        <a class="coo-close" title="Закрыть" id="privatePolicyBtn">Согласен</a>
    </div>
</div>  
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/feedback-form.js') }}"></script>

</body>

</html>
