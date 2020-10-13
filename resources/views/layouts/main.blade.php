<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
        <script src="{{ asset('js/jquery.coockie.js') }}"></script>
        <script src="{{ asset('font-awesome/js/all.min.js') }}"></script>
        <script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('js/inputmask.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

        <!-- Yandex.Metrika counter -->
		<script type="text/javascript" >
		(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
		m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		ym(66766309, "init", {
				clickmap:true,
				trackLinks:true,
				accurateTrackBounce:true,
				webvisor:true
		});
		</script>
		<noscript><div><img src="https://mc.yandex.ru/watch/66766309" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		<!-- /Yandex.Metrika counter -->

    </head>
    <body>
        <main id="main" class="gold585 home-content">
            <header>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="popup-close">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            @yield('content')
            

            <footer>
                <div class="container">
                   <div class="row">
                       <div class="col-12 d-flex justify-content-center">
                           <div class="soc-icons">
                                     <a href="/" class="insta-footer"></a>
                                     <a href="/" class="fb-footer"></a>
                                     <a href="/" class="vk-footer"></a>
                                 </div>
                       </div>
                   </div>
                    <div class="row">
                    <div class="col-md-8">
                        <div class="footer-links">
                            <a href="/">Продать золото или серебро</a>
                            <a href="/">Войти в личный кабинет</a>
                        </div>
                        <div class="copyright">© ООО «Граам», 2020</div>
                    </div>
                    <div class="col-md-4 footer-logo">
                        <img src="/images/logo-footer.svg" alt="Vasterra.com">
                        <span>Сделано в <a href="https://vasterra.com">Vasterra.com</a></span>
                    </div>
                    </div>
                </div>
            </footer>
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
