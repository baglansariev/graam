@extends('layouts.main')

@section('content')
<div class="modal-popup home-content">
    <div class="popup-wrapper">
        <div class="popup-close">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="popup-content d-flex justify-content-center">
                        <div class="content d-flex flex-column align-items-start">
                            <div class="title">
                                <h3>Прозрачная площадка</h3>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<main id="main" class="gold585">
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
    <div class="wrapper d-flex justify-content-center">
        <div class="main-block d-flex flex-column">

        </div>
        <div class="choice-block">
            <div class="choice-content d-flex justify-content-center align-items-center flex-column">
            </div>
        </div>
        <div class="sell-wrapper">
            <div class="sell-parameters d-flex flex-column justify-content-between">
                <div class="parameter-block d-flex align-items-start flex-column">
                    <div class="wanna-sell">
                        <span>Хочу продать</span>
                        <input type="number" class="sell-weight param-weight" placeholder="10">
                        <span>г</span>
                    </div>
                </div>
            </div>
            <div class="sell-block">
                <div class="sell-content d-flex flex-column align-items-center">
                    <div class="sell-cards d-flex"></div>
                    <div class="alternative-offer d-flex flex-column align-items-center">
                        <h3 class="text-center">Если не нашли выгодную сделку, то:</h3>
                        <button class="own-price-btn">Предложить свою</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @component('modules.auth.login')
    @endcomponent
    @component('modules.auth.register')
    @endcomponent
</main>

    @endsection