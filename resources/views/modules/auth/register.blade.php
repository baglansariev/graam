<div class="modal-popup reg-form">
    <div class="popup-wrapper">
        <div class="popup-close">
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
                            <div class="alert modal-popup-alert" role="alert">
                                <span class="message d-none"></span>
                                <h3>Спасибо!</h3>
                            </div>
                            <form method="POST" action="{{ route('register') }}" class="popup-form d-flex flex-column">
                                @csrf
                                <div class="price-input-container d-flex align-items-start flex-column">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="company" value="" placeholder="Название компании">
                                    </div>
                                    <div class="form-group">
                                         <input type="email" class="form-control" id="log-email" value="" placeholder="Электронная почта">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-wrapper d-flex align-items-center">
                                            <input type="password" class="form-control short" id="log-pass" value="" placeholder="Пароль">
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                            Согласен на обработку данных
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                                </div>
                                <p class="login-link"><a class="login-btn" href="/">Войдите</a>, если у вас есть аккаунт</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>