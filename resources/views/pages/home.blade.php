@extends('layouts.default')

@section('content')

<div class="wrapper d-flex justify-content-center" id="top">


    <div class="main-block d-flex flex-column">
        <div class="progress-block text-center">
            <span>0</span> %
        </div>
{{--        <div class="block-text">--}}
{{--            <p>Скупка золота и серебра, быстро, надежно и в срок</p>--}}
{{--        </div>--}}
    </div>

    <div class="choice-block">

        <div class="choice-content d-flex justify-content-center align-items-center flex-column">
            <div class="fullheight">
               
               <div class="main-choice-container">
                    <div class="wanna-sell">
                        <span>Хочу <span class="main-sell-trigger">продать</span><!--<i class="fas fa-sort-down"></i>--></span>
                        <input type="number" class="sell-weight text-right" placeholder="10">
                        <span class="main-weight-unit"></span>
                    </div>
                    <div class="select">
                        <div class="chosen d-flex">
                            <div class="chosen-container index">
                                <span data-name="gold" data-type="585">золота 585</span> пробы
                            </div>
{{--                            <i class="fas fa-sort-down"></i>--}}
                        </div>

                    </div>
                </div>
                <div class="action d-flex justify-content-center align-items-center">
                    <button type="button" id="sell">Продать</button>
                </div>
                <a class="why-link" href="#hp-content">Почему у нас?<img src="/images/why-link-bg2.svg" alt=""></a>
                
            </div>
            @component('home.content')@endcomponent
        </div>
    </div>
    <div class="sell-wrapper">
{{--        <div class="sell-parameters d-flex flex-column justify-content-between">--}}

{{--        </div>--}}
        <div class="sell-block">
            <div class="sell-content d-flex flex-column align-items-center">
                <div class="sell-content-params">
                    @component('modules.params_block')@endcomponent
                </div>
                <div class="sell-content-title factory-title text-center">
                    <p>Через трейдера и заводы</p>
                </div>
{{--                 <div class="sell-content-title text-center">--}}
{{--                 <p class="d-flex align-items-center justify-content-center flex-wrap">Продать <span class="active" data-type="fast">быстро</span><i class="fas fa-times"></i> и <span class="active" data-type="expensive">дорого</span><i class="fas fa-times"></i> через:</p>--}}
{{--                 </div>--}}
                <div class="sell-cards factory-cards d-flex">
                    @component('modules.preloader', ['class' => 'front'])@endcomponent
                </div>
                @if (isset($pawnshops) && $pawnshops->count())
                    <div class="sell-content-title lombard-title text-center mt-5">
                        <p>Через ломбарды</p>
                    </div>
                    <div class="lombard-switcher">
                        <div class="switch-container d-flex justify-content-center">
                            <button class="list-switch active" data-switch="#lombardCards">Списком</button>
                            <button class="map-switch" data-switch="#mapCards">На карте</button>
                        </div>
                    </div>
                    <div class="switcher-cards">
                        <div id="mapCards" class="map-cards">
                            <div class="switcher-map">
                                <iframe style="width: 100%; height: 100%;" src="https://yandex.ru/map-widget/v1/?um=constructor%3A4c240748fbfb9cb03a7ab32de4f62c692e56902ddc3466d30164a7e9c3de99f9&amp;source=constructor" frameborder="0"></iframe>
                            </div>
                        </div>
                        <div id="lombardCards" class="sell-cards lombard-cards">
{{--                            @component('pages.elements.lombard-cards', ['pawnshops' => $pawnshops])@endcomponent--}}
                        </div>
                    </div>
                @endif

                <div class="alternative-offer d-flex flex-column align-items-center">
                    <h3 class="text-center">Если не нашли выгодную сделку, то:</h3>
                    <button class="own-price-btn">Предложить свою</button>
                </div>
            </div>
        </div>
        @component('pages.elements.footer')@endcomponent

    </div>

    @component('modules.modals.materials-modal')@endcomponent
    @component('modules.modals.sell-modal')@endcomponent
    @component('pages.elements.footer', ['class' => 'main-footer'])@endcomponent
</div>

<script>
    function playClick() {
        $('video')[0].play();
    }


    $(document).ready(function() {
        $('video').bind('click', playClick);
        $("video").click(function() {
            $("video").unbind();
            $('.play-btn').fadeOut();
        });

    });

</script>

{!! $sell_form !!}
{!! $own_price_form !!}

@endsection
