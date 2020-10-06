@extends('layouts.main')
@section('content')
<script>
    $(document).ready(function() {
        $(".question").click(function() {
            $(this).toggleClass("opened-answer");
        });
    });

</script>
<div class="wrapper d-flex align-items-center flex-column">
    <div class="content-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="heading">Прозрачная площадка</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-10 row content-wrapper">
                    <div class="col-3 picture row">
                        <img src="/images/pictogram-super.png" alt="">
                    </div>
                    <div class="col-9 row">
                        <p>GRAAM — это проект созданный известной компанией «Первый ювелирный — драгоценные металлы», выступающей важным связующим звеном между скупщиками золота, ломбардами, аффинажными заводами, производителями ювелирных изделий, банками.</p>
                        <div class="accordion">
                            <div class="question">
                                <span class="quest-text">Предложения только от вашей компании?</span>
                                <div class="answer">
                                    <p>На площадке собраны предложения от компании «Первый ювелирный — драгоценные металлы», от 2-х заводах: «Завод 1», «Завод 2» и от компании «Такая-то»</p>
                                </div>
                            </div>
                            <div class="question">
                                <span class="quest-text">Почему вам можно верить?</span>
                                <div class="answer">
                                    <p>На площадке собраны предложения от компании «Первый ювелирный — драгоценные металлы», от 2-х заводах: «Завод 1», «Завод 2» и от компании «Такая-то»</p>
                                </div>
                            </div>
                            <div class="question">
                                <span class="quest-text">Почему это удобно?</span>
                                <div class="answer">
                                    <p>На площадке собраны предложения от компании «Первый ювелирный — драгоценные металлы», от 2-х заводах: «Завод 1», «Завод 2» и от компании «Такая-то»</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h2 class="heading">Сделка в пару кликов</h2>
                </div>
            </div>
            <div class="row steps">
                <div class="step">

                    <img src="/images/1-step-new.png" alt="">
                    <span class="step-heading">Выберите вес и пробу метала</span>
                </div>
                <div class="step">

                    <img src="/images/2-step-new.png" alt="">
                    <span class="step-heading">Выберите подходящее предложение</span>
                </div>
                <div class="step">

                    <img src="/images/3-step-new.png" alt="">
                    <span class="step-heading">В личном кабинете следите за всеми статусами сделки</span>
                </div>
            </div>


            <div class="row">
                <div class="col-10 row heading-wrapper">
                    <div class="col-4 row"></div>
                    <div class="col-8 row">
                        <h3 class="block-heading">Личный менеджер</h3>
                    </div>
                </div>
                <div class="col-10 row content-wrapper">
                    <div class="col-4 picture row">
                        <img src="/images/pm-collage.png" alt="">
                    </div>
                    <div class="col-8 row">
                        <p>Каждую сделку помогает провести ваш личный менеджер. Через него вы можете узнать любую информацию, а также сделать новый заказ.</p>
                        <p>Ваш менеджер всегда на связи с вами.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h2 class="heading">Нам доверяют</h2>
                </div>
                <div class="col-10 row carousel-wrapper">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <p>Очень удобно оформлять сделки. Приятный менеджер Кристина всегда помогает. Хочется отметить, что уже полгода сотрудничаем и только одни положительные эмоции. Очень доволен,
                                    все круто, так держать!</p>
                                <span class="small-text">менеджер ООО «Лютик и Ромашка»</span>
                                <span class="testimonial-name">Арсений Кириллов</span>

                            </div>
                            <div class="carousel-item">
                                <p>Очень удобно оформлять сделки. Приятный менеджер Кристина всегда помогает. Хочется отметить, что уже полгода сотрудничаем и только одни положительные эмоции. Очень доволен,
                                    все круто, так держать!</p>
                                <span class="small-text">менеджер ООО «Лютик и Ромашка»</span>
                                <span class="testimonial-name">Арсений Кириллов</span>
                            </div>
                            <div class="carousel-item">
                                <p>Очень удобно оформлять сделки. Приятный менеджер Кристина всегда помогает. Хочется отметить, что уже полгода сотрудничаем и только одни положительные эмоции. Очень доволен,
                                    все круто, так держать!</p>
                                <span class="small-text">менеджер ООО «Лютик и Ромашка»</span>
                                <span class="testimonial-name">Арсений Кириллов</span>
                            </div>
                            <div class="carousel-item">
                                <p>Очень удобно оформлять сделки. Приятный менеджер Кристина всегда помогает. Хочется отметить, что уже полгода сотрудничаем и только одни положительные эмоции. Очень доволен,
                                    все круто, так держать!</p>
                                <span class="small-text">менеджер ООО «Лютик и Ромашка»</span>
                                <span class="testimonial-name">Арсений Кириллов</span>
                            </div>
                            <div class="carousel-item">
                                <p>Очень удобно оформлять сделки. Приятный менеджер Кристина всегда помогает. Хочется отметить, что уже полгода сотрудничаем и только одни положительные эмоции. Очень доволен,
                                    все круто, так держать!</p>
                                <span class="small-text">менеджер ООО «Лютик и Ромашка»</span>
                                <span class="testimonial-name">Арсений Кириллов</span>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <button type="submit" class="btn btn-primary">Начать продавать</button>

</div>
@endsection
