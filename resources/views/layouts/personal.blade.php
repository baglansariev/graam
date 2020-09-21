<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="{{ asset('font-awesome/js/all.min.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/inputmask.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/jquery.jscroll.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("a.menu-link").click(function(event) {
                event.preventDefault();
                linkLocation = this.href;
                $(".personal-content").animate({
                    top: 13 + '%'
                }, 200).animate({
                    top: 100 + '%'
                }, 200, redirectPage);
            });

            function redirectPage() {
                window.location = linkLocation;
            }

            $("#mobmenu").click(function(event) {
                $(".personal-content").toggleClass('change-zindex');
            });
        });
    </script>    
</head>
<body>
    <main id="main" class="white personal">
        <div class="mobile-menu-toggler">
            <input id="mobmenu" class="mobmenu-input" type="checkbox">
            <label class="mobmenu-label" for="mobmenu">
                <div class="btn1" id="btn1">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </label>
            <div class="personal-menu row mobile-menu">
                <nav>
                    <ul class="personal-menu-list">
                        <li class="personal-menu-list-item">Витрина
                            <ul class="submenu">
                                <li class="personal-submenu-list-item"><a href="{{ route('all-deals') }}" class="menu-link {{ request()->routeIs('all-deals') ? 'active' : '' }}">Все сделки</a></li>
                            </ul>
                        </li>
                        <li class="personal-menu-list-item">Заявки
                            <ul class="submenu">
                                <li class="personal-submenu-list-item"><a href="{{ route('personal') }}" class="menu-link {{ request()->routeIs('personal') ? 'active' : '' }}">Активные</a></li>
                                <!--                                        <li class="personal-submenu-list-item"><a href="{{ route('personal-archive') }}" class="menu-link {{ request()->routeIs('personal-archive') ? 'active' : '' }}">История сделок</a></li>-->
                                <!--                                        <li class="personal-menu-list-item"><a href="{{ route('personal-discount') }}" class="menu-link {{ request()->routeIs('personal-discount') ? 'active' : '' }}">Дисконт</a></li>-->
                            </ul>
                        </li>
                        <li class="personal-menu-list-item"><a href="{{ route('personal-docs') }}" class="menu-link {{ request()->routeIs('personal-docs') ? 'active' : '' }}">Документы</a></li>
                        <li class="personal-menu-list-item"><a href="{{ route('personal-info') }}" class="menu-link {{ request()->routeIs('personal-info') ? 'active' : '' }}">Личные данные</a></li>

                        <!--
                                <li><a href="#" class="reg-link">Тест</a></li>
                                <li><a href="{{ route('personal-test') }}" class="more-info menu-link">Тест2</a></li>
-->
                        <li class="personal-menu-list-item">
                            <span style="cursor: pointer;" class="menu-link " onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Выход
                            </span>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>

                </nav>
                <div class="pm-wrapper">
                    <div class="contact-pm">
                        <div class="pm-img-wrap">
                            <img class="pm-img" src="{{ asset('images/manager1.png') }}" alt=""></div>
                        <p class="logo-subtitle">Ваш личный менеджер</p>
                        <span class="pm-name">Виктория</span>
                        <span class="pm-phone">+7 (906) 666 27 01</span>
                    </div>
                    <!--
                            <div class="contact-pm-form">
                                <p class="pm-message">Написать сообщение</p>
                                <form action="/">

                                    <input type="text" id="username" name="username" value="{username}">
                                    <textarea name="message" id="message"></textarea>
                                    <button type="submit" class="btn primary-btn"></button>
                                </form>
                            </div>
-->
                </div>
            </div>
        </div>




        <div class="container-fluid wrapper">
            <div class="row">
                <div class="col-sm-12 personal-wrapper ">
                    <header>
                        <div class="header-logo">
                            <a href="/" class="main-logo-personal d-flex justify-content-center align-items-center flex-column">
                                <p class="logo-title"><span>G</span>RAAM</p>
                                <p class="logo-subtitle">Продать быстро и дорого</p>
                            </a>
                        </div>


                    </header>



                    <div class="col-sm-3 personal-menu row desc">

                        <nav>
                            <ul class="personal-menu-list">
                                <li class="personal-menu-list-item">Витрина
                                    <ul class="submenu">
                                        <li class="personal-submenu-list-item"><a href="{{ route('all-deals') }}" class="menu-link {{ request()->routeIs('all-deals') ? 'active' : '' }}">Все сделки</a></li>
                                    </ul>
                                </li>
                                <li class="personal-menu-list-item">Заявки
                                    <ul class="submenu">
                                        <li class="personal-submenu-list-item"><a href="{{ route('personal') }}" class="menu-link {{ request()->routeIs('personal') ? 'active' : '' }}">Активные</a></li>
                                        <!--                                        <li class="personal-submenu-list-item"><a href="{{ route('personal-archive') }}" class="menu-link {{ request()->routeIs('personal-archive') ? 'active' : '' }}">История сделок</a></li>-->
                                        <!--                                        <li class="personal-menu-list-item"><a href="{{ route('personal-discount') }}" class="menu-link {{ request()->routeIs('personal-discount') ? 'active' : '' }}">Дисконт</a></li>-->
                                    </ul>
                                </li>
                                <li class="personal-menu-list-item"><a href="{{ route('personal-docs') }}" class="menu-link {{ request()->routeIs('personal-docs') ? 'active' : '' }}">Документы</a></li>
                                <li class="personal-menu-list-item"><a href="{{ route('personal-info') }}" class="menu-link {{ request()->routeIs('personal-info') ? 'active' : '' }}">Личные данные</a></li>

                                <!--
                                <li><a href="#" class="reg-link">Тест</a></li>
                                <li><a href="{{ route('personal-test') }}" class="more-info menu-link">Тест2</a></li>
-->
                                <li class="personal-menu-list-item">
                                    <span style="cursor: pointer;" class="menu-link " onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выход
                                    </span>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>

                            </ul>

                        </nav>
                        <div class="pm-wrapper">
                            <div class="contact-pm">
                                <div class="pm-img-wrap">
                                    <img class="pm-img" src="{{ asset('images/manager1.png') }}" alt=""></div>
                                <p class="logo-subtitle">Ваш личный менеджер</p>
                                <span class="pm-name">Виктория</span>
                                <span class="pm-phone">+7 (906) 666 27 01</span>
                            </div>
                            <!--
                            <div class="contact-pm-form">
                                <p class="pm-message">Написать сообщение</p>
                                <form action="/">

                                    <input type="text" id="username" name="username" value="{username}">
                                    <textarea name="message" id="message"></textarea>
                                    <button type="submit" class="btn primary-btn"></button>
                                </form>
                            </div>
-->
                        </div>
                    </div>
                    <div class="col-sm-9 personal-content-wrapper">
                        <div class="personal-content sell-block">
                            <div class="sell-content d-flex flex-column align-items-center">
                                @yield('content')
                                @component('modules.preloader')@endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{--@component('modules.auth.register')--}}
    {{-- @endcomponent--}}
    {{--@component('modules.auth.login')--}}
    {{--@endcomponent--}}
    {{--@component('modules.home.content')--}}
    {{--@endcomponent--}}
    @component('modules.modals.join')
    @endcomponent

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/feedback-form.js') }}"></script>
    <script>        
        let screen = window.innerWidth;
        let grid = document.getElementById('grid');
        console.log(grid);
        if(screen <= 767) {
            document.getElementById('grid').style.display = 'none';
            document.getElementById('list').style.display = 'none';
              document.getElementById('deals').classList.remove('list-view');
              document.getElementById('deals').classList.add('grid-view');
              document.getElementByClassName('personal-content').classList.add('no-shadow');                     
        }        
    </script>
</body>

</html>
