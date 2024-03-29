<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'ГРААМ' }}</title>
    <link rel="shortcut icon" href="{{ asset('images/template/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/feedback-form.css') }}">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.coockie.js') }}"></script>
    <script src="{{ asset('font-awesome/js/all.min.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/inputmask.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/jquery.jscroll.min.js') }}"></script>
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
        $(document).ready(function() {
            $("a.menu-link").click(function(event) {
                event.preventDefault();
                linkLocation = this.href;
                $(".personal-content").animate({
                    top: 120 + 'px'
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

            $.ajax({
                    url: '/admin/stock-infos', // путь к ajax-обработчику
                    method: 'GET',
                    data: {},
                    dataType: 'JSON',
                    success: function(data) {
                        let content = '';
                        if (data.length > 0) {
                            $.each(data, function(index, data) {
                                if ( data.price_type_1 == 0 && data.price_type_2 == 0 ) {
                                content += '<span>Цена золота 999 <strong>' + data.gold_price + ' </strong> ₽/г</span>';
                                }
                                if (data.price_type_1 == 0 && data.price_type_2 != 0) {
                                    content += '<span>Цена золота 999 <strong>' + data.gold_price + '</strong> ₽/г</span><br><span>Средняя цена покупки гранул 999 <strong>' + data.price_type_2 + '</strong> ₽/г</span>';
                                }

                                if (data.price_type_1 != 0 && data.price_type_2 == 0) {
                                    content += '<span>Цена золота 999 <strong>' + data.gold_price + '</strong> ₽/г</span><br><span>Средняя цена продажи лома 585 <strong>' + data.price_type_1 + '</strong> ₽/г</span>';
                                }
                                if (data.price_type_1 != 0 && data.price_type_2 != 0) {
                                    content += '<span>Цена золота 999 <strong>' + data.gold_price + '</strong> ₽/г</span><br><span>Средняя цена продажи лома 585 <strong>' + data.price_type_1 + '</strong> ₽/г</span><br><span>Средняя цена покупки гранул 999 <strong>' + data.price_type_2 + '</strong> ₽/г</span>';
                                }

                            });
                        }
                        $(".stock-infos").html(content);

                    }

            })
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
                                <li class="personal-submenu-list-item"><a href="{{ route('scrub-deals') }}" class="menu-link {{ request()->routeIs('scrub-deals') ? 'active' : '' }}">Заявки по лому</a></li>
                                <li class="personal-submenu-list-item"><a href="{{ route('gp-deals') }}" class="menu-link {{ request()->routeIs('gp-deals') ? 'active' : '' }}">Заявки по ГП</a></li>
                            </ul>
                        </li>
                        <li class="personal-menu-list-item">Заявки
                            <ul class="submenu">
                                <li class="personal-submenu-list-item"><a href="/" class="menu-link">Добавить</a></li>
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
		
                <div class="stock-infos">
                        </div>
                <div class="pm-wrapper">
                    <div class="contact-pm">
                        <div class="pm-img-wrap">
                            <img class="pm-img" src="{{ asset('images/manager'. $manager->id .'.png') }}" alt=""></div>
                        <p class="logo-subtitle">Ваш личный менеджер</p>
                        <span class="pm-name">{{$manager->name}}</span>
                        <span class="pm-phone">{{$manager->phone}}</span>
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
                                <img src="{{ asset('images/graam_rus_black.png') }}" class="img_personal_logo" alt="">
{{--                                <p class="logo-title"><span>G</span>RAAM</p>--}}
                                <p class="logo-subtitle text-center" style="line-height: 1.1">Один грамм, <br> много возможностей</p>
                            </a>
                        </div>


                    </header>



                    <div class="col-sm-3 personal-menu row desc">

                        <nav>
                            <ul class="personal-menu-list">
                                <li class="personal-menu-list-item">Витрина
                                    <ul class="submenu">
                                        <li class="personal-submenu-list-item"><a href="{{ route('scrub-deals') }}" class="menu-link {{ request()->routeIs('scrub-deals') ? 'active' : '' }}">Заявки по лому</a></li>
                                        <li class="personal-submenu-list-item"><a href="{{ route('gp-deals') }}" class="menu-link {{ request()->routeIs('gp-deals') ? 'active' : '' }}">Заявки по ГП</a></li>
                                    </ul>
                                </li>
                                <li class="personal-menu-list-item">Заявки
                                    <ul class="submenu">
                                        <li class="personal-submenu-list-item"><a href="/" class="menu-link">Добавить</a></li>
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

                                    <form id="" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>

                            </ul>

                        </nav>

                        <div class="stock-infos">
                        </div>


                        <div class="pm-wrapper">
                            <div class="contact-pm">
                                <div class="pm-img-wrap">
                                    <img class="pm-img" src="{{ asset('images/manager'.$manager->id.'.png') }}" alt=""></div>
                                <p class="logo-subtitle">Ваш личный менеджер</p>
                                <span class="pm-name">{{$manager->name}}</span>
                                <span class="pm-phone">{{$manager->phone}}</span>
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
                            <div class="sell-content d-flex flex-column align-items-center @if (in_array('docs', explode('/', request()->getUri()))) documents @endif">
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
        let screenH = window.innerHeight;
        if (screenH <= 560) {
            document.getElementById('main').style.overflow = 'auto';
        }

    </script>
</body>

</html>
