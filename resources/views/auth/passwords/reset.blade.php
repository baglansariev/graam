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
                                <h3>Восстановление пароля</h3>
                            </div>

                            <form method="POST" action="{{ route('password.update') }}" class="popup-form d-flex flex-column">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="price-input-container d-flex align-items-start flex-column">
                                    <div class="form-group pass-group">
                                        <label for="email">E-mail адрес:</label>
                                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group pass-group">
                                        
                                            <label for="password">Пароль:</label>
                                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror short" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        
                                    </div>
                                    <div class="form-group  pass-group">
                                        
                                            <label for="password-confirm">Подтверждение пароля:</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary  reset-pass">Восстановить пароль</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection