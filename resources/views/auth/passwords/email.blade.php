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
                             @if (session('status'))
                            <div class="alert remainder" role="alert">
                                <h4> {{ session('status') }} </h4>
                            </div>
                            @endif
                                    
                            <form method="POST" action="{{ route('password.email') }}" class="popup-form d-flex flex-column" id="res-pass">
                                @csrf
                                <div class="price-input-container d-flex align-items-start flex-column">
                                    <div class="form-group">
                                         <label for="inputEmail4">E-mail адрес:</label>
                                         <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                         @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary reset-pass">Отправить ссылку восстановления</button>
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






