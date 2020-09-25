@extends('layouts.default')

@section('content')

<div class="wrapper d-flex justify-content-center">
    <div class="main-block d-flex flex-column">
        <div class="progress-block text-center">
            <span>0</span> %
        </div>
        <div class="block-text">
            <p>Скупка золота и серебра, быстро, надежно и в срок</p>
        </div>
    </div>
    <div class="video-index">
        <div class="modal-video-close" onclick="stop()">
            <span></span>
            <span></span>
        </div>
        <div class="video-wrapper">
           
            <div class="play-btn"><img src="/images/play-button.svg" alt="Возпроизведение"></div>
            <video id="main-video" width="100%" height="100%" preload="none" playsinline="" controls poster="/images/new_gold.jpg">
                <source src="https://player.vimeo.com/external/461289085.hd.mp4?s=4b2c2356b99e5e5580646c29031f6a7b3b0fec9c&profile_id=175" type="video/mp4">
                
                Your browser does not support the video tag.

            </video>


<!--            <iframe id="main-video" width="560" height="315" src="https://www.youtube-nocookie.com/embed/A8MabQgpCd4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
        </div>

    </div>
    <div class="choice-block">

        <div class="choice-content d-flex justify-content-center align-items-center flex-column">
            <div class="wanna-sell">
                <span>Хочу <span class="main-sell-trigger">продать</span><i class="fas fa-sort-down"></i></span>
                <input type="number" class="sell-weight text-right" placeholder="10">
                <span>г</span>
            </div>
            <div class="select">
                <div class="chosen d-flex">
                    <div class="chosen-container index">
                        <span data-name="gold" data-type="585">золота 585</span> пробы
                    </div>
                    <i class="fas fa-sort-down"></i>
                </div>
                @component('modules.modals.materials-modal')@endcomponent
                @component('modules.modals.sell-modal')@endcomponent
            </div>
            <div class="action d-flex justify-content-center align-items-center">
                <button type="button" id="sell">Продать</button>
            </div>
        </div>
    </div>
    <div class="sell-wrapper">
        <div class="sell-parameters d-flex flex-column justify-content-between">
            <div class="parameter-block d-flex align-items-start flex-column">
                <div class="wanna-sell">
                    <span class="d-flex">Хочу <span class="sell-trigger ml-1">продать</span></span>
                    <input type="number" class="sell-weight param-weight" placeholder="10">
                    <span>г</span>
                </div>
                <div class="select">
                    <div class="selected left-chosen">
                        <span>золото 585</span> пр.
                        <i class="fas fa-sort-down"></i>
                    </div>
                </div>
            </div>
            <div class="currency-block d-flex flex-column">
                <ul class="currencies">
                    <li class="dollar">
                        <span><i class="fas fa-sort-up"></i> {{ $currency['USD']['Value'] }}</span>
                        <span>$ USD</span>
                    </li>
                    <li class="gold">
                        <span><i class="fas fa-sort-up"></i></span>
                        <span>золото</span>
                    </li>
                </ul>
                <p class="note">
                    курсы актуальны <br>
                    на {{ date('d.m.Y H:i') }}
                </p>
            </div>
        </div>
        <div class="sell-block">
            <div class="sell-content d-flex flex-column align-items-center">
                {{-- <div class="sell-content-title text-center">--}}
                {{-- <p class="d-flex align-items-center justify-content-center flex-wrap">Продать <span class="active" data-type="fast">быстро</span><i class="fas fa-times"></i> и <span class="active" data-type="expensive">дорого</span><i class="fas fa-times"></i> через:</p>--}}
                {{-- </div>--}}
                <div class="sell-cards d-flex"></div>
                <div class="alternative-offer d-flex flex-column align-items-center">
                    <h3 class="text-center">Если не нашли выгодную сделку, то:</h3>
                    <button class="own-price-btn">Предложить свою</button>
                </div>
            </div>
        </div>
    </div>

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
