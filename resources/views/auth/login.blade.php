@extends('layouts.blank')

@section('content')
   <div class="modal-popup login-form">
    <div class="popup-wrapper">
        <a href="{{ url('/') }}" class="login-close">
            
                <span></span>
                <span></span>
           
        </a>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="popup-content d-flex justify-content-center">
                        <div class="content d-flex flex-column align-items-start">
                            <div class="title">
                                <h3>Войти в личный кабинет</h3>
                            </div>
<!--
                            <div class="form-group">
                                 <label class="soc-label">Через соцсети</label>
                                 <div class="soc-icons">
                                     <img src="/images/insta.svg" alt="Instagram" title="Instagram">
                                     <img src="/images/fb.svg" alt="Facebook" title="Facebook">
                                     <img src="/images/vk.svg" alt="VKontakte" title="VKontakte">
                                 </div>
                             </div>
-->
                            <div class="alert modal-popup-alert" role="alert">
                                <span class="message d-none"></span>
                                <h3>Спасибо!</h3>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="popup-form d-flex flex-column">
                                @csrf
                                <div class="price-input-container d-flex align-items-start flex-column">
                                    <div class="form-group">
                                         <label for="inputEmail4">Через электронную почту:</label>
                                         <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="" placeholder="Электронная почта">
                                         @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-wrapper d-flex align-items-center">
                                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror short" value="" placeholder="Пароль">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
<!--
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    Забыли пароль?
                                                </a>
                                            @endif
-->
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Войти</button>
                                </div>
                                <p class="reg-link-wrap"><a href="{{ route('register') }}">Зарегистрируйтесь</a>, если у вас нет аккаунта</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
