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
                <input type="number" class="sell-weight" placeholder="10">
                <span>г</span>
            </div>
            <div class="select">
                <div class="chosen">
                    <span>золото 585</span> пробы
                    <i class="fas fa-sort-down"></i>
                </div>
                <div class="modal-options-wrapper">
                    <div class="modal-options d-flex justify-content-center align-items-center">
                        <div class="modal-options-close">
                            <span></span>
                            <span></span>
                        </div>
                        <div class="options">
                            <div class="option selected">
                                <span>золото 585</span> пробы
                                <i class="fas fa-sort-up"></i>
                            </div>
                            <div class="option" data-type="gold">
                                <span>золото 999</span>
                            </div>
                            <div class="option" data-type="silver">
                                <span>серебро 999</span>
                            </div>
                            <div class="option" data-type="silver">
                                <span>серебро 925</span>
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
                    <div class="chosen">
                        <span>золото 585</span> пр.
                        <i class="fas fa-sort-down"></i>
                    </div>
                </div>
            </div>
            <div class="currency-block d-flex flex-column">
                <ul class="currencies">
                    <li class="">
                        <span><i class="fas fa-sort-up"></i> 69.39</span>
                        <span>$ USD</span>
                    </li>
                    <li class="">
                        <span><i class="fas fa-sort-up"></i> 3930.78</span>
                        <span>золото</span>
                    </li>
                </ul>
                <p class="note">
                    курсы актуальны <br>
                    на 24.06.2020 21:00
                </p>
            </div>
        </div>
        <div class="sell-block">
            <div class="sell-content d-flex flex-column align-items-center">
                <div class="sell-content-title text-center">
                    <p class="d-flex align-items-center justify-content-center flex-wrap">Продать <span>быстро</span><i class="fas fa-times"></i> и <span>дорого</span><i class="fas fa-times"></i> через:</p>
                </div>
                <div class="sell-cards d-flex justify-content-around">
                    <div class="card">
                        <div class="card-title d-flex align-items-center">
                            <img src="{{ asset('images/graam_logo.png') }}" alt="" class="card-logo">
                            <p>Первый ювелирный</p>
                        </div>
                        <div class="card-offer">
                            <div class="price">
                                109 000 ₽
                            </div>
                            <div class="time">
                                через 3 дня
                            </div>
                        </div>
                        <div class="card-actions d-flex flex-column justify-content-center">
                            <button type="button">Позвонить</button>
                            <a href="">
                                <i class="fab fa-telegram-plane"></i>
                                <span>Написать в телеграм</span>
                            </a>
                        </div>
                        <div class="card-details">
                            <ul>
                                <li>Наличный и б/н расчет</li>
                                <li>Транспортировка входит в цену</li>
                                <li>Фиксация цены</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-title d-flex align-items-center">
                            <img src="{{ asset('images/graam_logo.png') }}" alt="" class="card-logo">
                            <p>Новосибирский аффинажный завод</p>
                        </div>
                        <div class="card-offer">
                            <div class="price">
                                125 000 ₽
                            </div>
                            <div class="time">
                                через 14 дней
                            </div>
                        </div>
                        <div class="card-actions d-flex flex-column justify-content-center">
                            <button type="button">Позвонить</button>
                            <a href="">
                                <i class="fab fa-telegram-plane"></i>
                                <span>Написать в телеграм</span>
                            </a>
                        </div>
                        <div class="card-details">
                            <ul>
                                <li>Наличный и б/н расчет</li>
                                <li>Транспортировка входит в цену</li>
                                <li>Фиксация цены</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-title d-flex align-items-center">
                            <img src="{{ asset('images/graam_logo.png') }}" alt="" class="card-logo">
                            <p>Красцветмет</p>
                        </div>
                        <div class="card-offer">
                            <div class="price">
                                122 000 ₽
                            </div>
                            <div class="time">
                                через 14 дней
                            </div>
                        </div>
                        <div class="card-actions d-flex flex-column justify-content-center">
                            <button type="button">Позвонить</button>
                            <a href="">
                                <i class="fab fa-telegram-plane"></i>
                                <span>Написать в телеграм</span>
                            </a>
                        </div>
                        <div class="card-details">
                            <ul>
                                <li>Наличный и б/н расчет</li>
                                <li>Транспортировка входит в цену</li>
                                <li>Фиксация цены</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-title d-flex align-items-center">
                            <img src="{{ asset('images/graam_logo.png') }}" alt="" class="card-logo">
                            <p>Первый ювелирный</p>
                        </div>
                        <div class="card-offer">
                            <div class="price">
                                109 000 ₽
                            </div>
                            <div class="time">
                                через 3 дня
                            </div>
                        </div>
                        <div class="card-actions d-flex flex-column justify-content-center">
                            <button type="button">Позвонить</button>
                            <a href="">
                                <i class="fab fa-telegram-plane"></i>
                                <span>Написать в телеграм</span>
                            </a>
                        </div>
                        <div class="card-details">
                            <ul>
                                <li>Наличный и б/н расчет</li>
                                <li>Транспортировка входит в цену</li>
                                <li>Фиксация цены</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-title d-flex align-items-center">
                            <img src="{{ asset('images/graam_logo.png') }}" alt="" class="card-logo">
                            <p>Новосибирский аффинажный завод</p>
                        </div>
                        <div class="card-offer">
                            <div class="price">
                                125 000 ₽
                            </div>
                            <div class="time">
                                через 14 дней
                            </div>
                        </div>
                        <div class="card-actions d-flex flex-column justify-content-center">
                            <button type="button">Позвонить</button>
                            <a href="">
                                <i class="fab fa-telegram-plane"></i>
                                <span>Написать в телеграм</span>
                            </a>
                        </div>
                        <div class="card-details">
                            <ul>
                                <li>Наличный и б/н расчет</li>
                                <li>Транспортировка входит в цену</li>
                                <li>Фиксация цены</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-title d-flex align-items-center">
                            <img src="{{ asset('images/graam_logo.png') }}" alt="" class="card-logo">
                            <p>Красцветмет</p>
                        </div>
                        <div class="card-offer">
                            <div class="price">
                                122 000 ₽
                            </div>
                            <div class="time">
                                через 14 дней
                            </div>
                        </div>
                        <div class="card-actions d-flex flex-column justify-content-center">
                            <button type="button">Позвонить</button>
                            <a href="">
                                <i class="fab fa-telegram-plane"></i>
                                <span>Написать в телеграм</span>
                            </a>
                        </div>
                        <div class="card-details">
                            <ul>
                                <li>Наличный и б/н расчет</li>
                                <li>Транспортировка входит в цену</li>
                                <li>Фиксация цены</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection