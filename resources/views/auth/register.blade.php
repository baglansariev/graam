@extends('layouts.blank')

@section('content')

<script>
    function copyValueTo(fromElem, toElemId) {
        var elem = document.getElementById(toElemId);
        elem.value = fromElem.value;
    }   
</script>
<div class="modal-popup reg-form">
    <div class="popup-wrapper">
        <div class="login-close">
            <span></span>
            <span></span>
        </div>
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
                                        <input class="form-check-input iscompany" type="radio" name="entity_type" id="iscompany" value="1" checked onclick="Show(1);">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Компании
                                        </label>
                                    </div>
                                    <div class="form-check radio">
                                        <input class="form-check-input ishuman" type="radio" name="entity_type" id="ishuman" value="" onclick="Show(0);">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Физического лица
                                        </label>
                                    </div>

                                    <div class="form-group company-name" id="company-name">
                                        <input type="text" class="form-control" id="company" value="" placeholder="Название компании" name="company_name">
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
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" required>
                                            Согласен на обработку данных
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
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
