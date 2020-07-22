@extends('layouts.default')

@section('content')

<div class="wrapper d-flex justify-content-center">
    <div class="main-block d-flex flex-column">
        <div class="block-text d-flex flex-column align-items-center">
            <h2 class="block-title">GRAAM</h2>
            <p class="text-center">
                Скупка золота и серебра, быстро,
                <br>
                 надежно и в срок
            </p>
        </div>
        <div class="progress-block text-center">
            <span>0</span> %
        </div>
    </div>
    <div class="choice-block">
        <div class="choice-content d-flex justify-content-center align-items-center flex-column">
            <div class="wanna-sell">
                <span>Хочу продать</span>
                <input type="number" class="sell-weight text-right" placeholder="10">
                <span>г</span>
            </div>
            <div class="select">
                <div class="chosen d-flex">
                    <span data-name="gold" data-type="585">золото 585</span> пробы
                    <i class="fas fa-sort-down"></i>
                </div>
                <div class="modal-options-wrapper">
                    <div class="options-block d-flex justify-content-center">
                        <div class="modal-options-close">
                            <span></span>
                            <span></span>
                        </div>
                        <div class="options-content d-flex align-items-center flex-column">
                            <div class="modal-options">
                                <div class="select">
                                    <div class="options">
                                        <div class="option selected d-flex align-items-center">
                                            <span>золото 585</span> пробы
                                            <i class="fas fa-sort-up"></i>
                                        </div>
                                        <div class="option" data-name="gold" data-type="999">
                                            <span>золото 999</span>
                                        </div>
                                        <div class="option" data-name="silver" data-type="999">
                                            <span>серебро 999</span>
                                        </div>
                                        <div class="option" data-name="silver" data-type="925">
                                            <span>серебро 925</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <span>Хочу продать</span>
                    <input type="number" class="sell-weight" placeholder="10">
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
                    <li class="">
                        <span><i class="fas fa-sort-up"></i> {{ $currency['dollar']['value'] }}</span>
                        <span>$ USD</span>
                    </li>
                    <li class="">
                        <span><i class="fas fa-sort-up"></i> {{ $currency['gold']['value'] }}</span>
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
                <div class="sell-content-title text-center">
                    <p class="d-flex align-items-center justify-content-center flex-wrap">Продать <span>быстро</span><i class="fas fa-times"></i> и <span>дорого</span><i class="fas fa-times"></i> через:</p>
                </div>
                <div class="sell-cards d-flex justify-content-around"></div>
            </div>
        </div>
    </div>
    {!! $sell_form !!}
</div>

@endsection