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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/feedback-form.css') }}">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('font-awesome/js/all.min.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/inputmask.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("a.menu-link").click(function(event){
                event.preventDefault();
                linkLocation = this.href;
                $(".personal-content").animate({top: 13 + '%'}, 200).animate({top: 100 + '%'}, 200, redirectPage);
            });
            function redirectPage() {
                window.location = linkLocation; }
        });

    </script>
</head>
<body>
<main id="main" class="white personal">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header-logo">
                        <a href="/" class="main-logo-personal d-flex justify-content-center align-items-center flex-column">
                            <p class="logo-title"><span>G</span>RAAM</p>
                            <p class="logo-subtitle">Продать быстро и дорого</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
        <div class="container-fluid wrapper">
            <div class="row">
                <div class="col-sm-12 personal-wrapper ">
                    <div class="col-sm-3 personal-menu row">
                        <nav>
                            <ul class="personal-menu-list">
                                <li class="personal-menu-list-item">Заявки
                                    <ul class="submenu">
                                        <li class="personal-submenu-list-item"><a href="{{ route('personal') }}" class="menu-link {{ request()->routeIs('personal') ? 'active' : '' }}">Активные</a></li>
                                        <li class="personal-submenu-list-item"><a href="{{ route('personal-archive') }}" class="menu-link {{ request()->routeIs('personal-archive') ? 'active' : '' }}">История сделок</a></li>
                                        <li class="personal-menu-list-item"><a href="{{ route('personal-discount') }}" class="menu-link {{ request()->routeIs('personal-discount') ? 'active' : '' }}">Дисконт</a></li>
                                    </ul>
                                </li>
                                <li class="personal-menu-list-item"><a href="{{ route('personal-docs') }}" class="menu-link {{ request()->routeIs('personal-docs') ? 'active' : '' }}">Документы</a></li>
                                <li class="personal-menu-list-item"><a href="{{ route('personal-info') }}" class="menu-link {{ request()->routeIs('personal-info') ? 'active' : '' }}">Личные данные</a></li>
                                <li><a href="#" class="reg-link">Тест</a></li>
                                <li><a href="{{ route('personal-test') }}" class="more-info menu-link">Тест2</a></li>
                            </ul>

                        </nav>
                        <div class="pm-wrapper">
                            <div class="contact-pm">
                                <img class="pm-img" src="/images/pm.png" alt="">
                                <p class="logo-subtitle">Ваш личный менеджер</p>
                                <span class="pm-name">Кристина</span>
                                <span class="pm-phone">+7 999 123-45-67</span>
                            </div>
                            <div class="contact-pm-form">
                                <p class="pm-message">Написать сообщение</p>
                                <form action="/">

                                    <input type="text" id="username" name="username" value="{username}">
                                    <textarea name="message" id="message" ></textarea>
                                    <button type="submit" class="btn primary-btn"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 personal-content-wrapper">
                        <div class="personal-content sell-block">
                            <div class="sell-content d-flex flex-column align-items-center">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
{{--@component('modules.auth.register')--}}
{{--    @endcomponent--}}
{{--@component('modules.auth.login')--}}
{{--@endcomponent--}}
{{--@component('modules.home.content')--}}
{{--@endcomponent--}}


<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/feedback-form.js') }}"></script>
</body>
</html>

