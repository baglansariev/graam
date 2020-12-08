@extends('layouts.blank')

@section('content')
<?php
    $cities = ['Абакан','Анадырь','Архангельск','Астарахань','Барнаул','Белгород','Биробиджан','Благовещенск','Брянск','Великий Новгород','Владивосток','Владикавказ','Владимир','Волгоград','Вологда','Воронеж','Горно-Алтайск','Екатеринбург','Иваново','Ижевск','Иркутск','Йошкар-Ола','Казань','Калининград','Калуга','Кемерово','Керчь','Киров','Кострома','Краснодар','Красноярск','Курган','Курск','Кызыл','Липецк','Магадан','Майкоп','Махачкала','Москва','Мурманск','Нальчик','Нижний Новгорд','Новосибирск','Омск','Орел','Оренбург','Пенза','Пермь','Петразоводск','Петропавловск-Камчатский','Псков','Ростов-на-Дону','Рязань','Салехард','Самара','Санкт-Петербург','Саранск','Саратов','Севастополь','Симферополь','Смоленск','Ставрополь','Сыктывкар','Тамбов','Тверь','Томск','Тула','Тюмень','Улан-Удэ','Ульяновск','Уфа','Хабаровск','Ханты-Мансийск','Чебоксары','Челябинск','Черкесск','Чита','Элиста','Южно-Сахалинск','Якутск','Ялта','Ярославль'];
    $i = 0;
    $cities_count = count($cities);
?>
<script>
    function copyValueTo(fromElem, toElemId) {
        var elem = document.getElementById(toElemId);
        elem.value = fromElem.value;
    }
</script>
<div class="modal-popup reg-form">
    <div class="popup-wrapper">
        <a href="{{ route('login') }}" class="login-close">
            <span></span>
            <span></span>
        </a>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="popup-content d-flex justify-content-center">
                        <div class="content d-flex flex-column align-items-start">
                            <div class="title">
                                <h3>Регистрация</h3>
                            </div>
                            <!--
                            <div class="alert modal-popup-alert" role="alert">
                                <span class="message d-none"></span>
                                <h3>Спасибо!</h3>
                            </div>
-->
                            <form method="POST" action="{{ route('register') }}" class="popup-form d-flex flex-column">
                                @csrf
                                <div class="price-input-container d-flex align-items-start flex-column">
                                    <div class="form-check radio">
                                        <label class="form-check-label" for="iscompany">
                                        <input class="form-check-input iscompany" type="radio" name="entity_type" id="iscompany" value="1" checked onclick="Show(1);">
                                            Компании
                                        </label>
                                    </div>
                                    <div class="form-check radio">
                                        <label class="form-check-label" for="ishuman">
                                        <input class="form-check-input ishuman" type="radio" name="entity_type" id="ishuman" value="2" onclick="Show(0);">
                                            Физического лица
                                        </label>
                                    </div>

                                    <div class="form-group company-name" id="company-name">
                                        <input type="text" class="form-control" id="company" @if(request()->has('company_name')) value="{{ request()->get('company_name') }}" @endif placeholder="Название компании" name="company_name">
                                    </div>
                                    <div class="form-group company-name">
                                        <input type="text" class="form-control" id="name" value="" placeholder="Ф.И.О." name="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control phone-register-input @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}" placeholder="Телефон"  name="phone" required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('phone.has_phone') }}</strong>
                                        </span>
                                        @enderror
                                        @if(isset($error_phone))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('phone.has_phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Электронная почта">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('email.has_email') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-wrapper d-flex align-items-center">
                                            <input id="password" onkeyup="copyValueTo(this, 'password-confirm')" type="password" class="form-control short @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Пароль">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                            <input hidden id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="city-label" for="city">Выберите город:</label>
                                        <select class="form-control" id="city" name="city">
                                              <?php
                                                while ($i < $cities_count) {
                                                    if ($i == 38) {
                                                        echo '<option selected="selected">' . $cities[$i] . '</option>';
                                                    }else{
                                                        echo '<option>' . $cities[$i] . '</option>';
                                                    }
                                                $i++;
                                                }
                                                ?>
                                            </select>
                                    </div>
                                     <div class="form-group register-btn">

                                         <button type="submit" class="btn btn-primary">Зарегистрироваться</button></div>
                                    <input class="form-check-input" type="hidden" value="true" id="accept" name="accept" checked>
                                <label class="form-check-label accept-label" for="accept">
                                    Нажимая на кнопку "Зарегистрироваться", вы соглашаетесь на обработку персональных данных и с <a href="/privacy-policy" target="_blank">политикой конфиденциальности</a>
                                </label>
                                </div>
                                <p class="login-link"><a href="{{ route('login') }}">Войдите</a>, если у вас есть аккаунт</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>

function Show(a) {
        obj=document.getElementById("company-name");
        if (a) obj.style.display="block";
        else obj.style.display="none";
}
</script>
@endsection
