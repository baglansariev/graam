<div class="modal-popup modal-sell">
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
                                <h3>Заявка на <span class="keyword">продажу</span></h3>
                            </div>
                            <div class="subtitle">
                                50 г золота 585 пробы через ПЮДМ
                            </div>
                            <div class="alert modal-popup-alert" role="alert">
                                <span class="message d-none"></span>
                                <h3>Спасибо!</h3>
                                <p>
                                    Ваша заявка на продажу принята,
                                    <br>
                                    наш менеджер скоро свяжется с вами
                                </p>
                            </div>
                            <form action="{{ route('sell-app') }}" class="popup-form d-flex flex-column">
                                @if(Auth::user() && isset(Auth::user()->name) && Auth::user()->detailsFromCrm()->name !== '')
                                    <input type="text" class="name-input" name="name_test" value="{{ Auth::user()->name }}" disabled>
                                    <input type="hidden" class="name-input" name="name" value="{{ Auth::user()->name }}" required>
                                @else
                                    <input type="text" class="name-input" name="name" placeholder="Имя" required>
                                @endif

                                @if(Auth::user() && isset(Auth::user()->detailsFromCrm()->phone) && Auth::user()->detailsFromCrm()->phone !== '')
                                    <input type="text" class="phone-input" name="phone_test" value="{{ Auth::user()->detailsFromCrm()->phone ?? '+7' }}" disabled>
                                    <input type="hidden" class="phone-input" name="phone" value="{{ Auth::user()->detailsFromCrm()->phone ?? '+7' }}" required>
                                @else
                                    <input type="text" class="phone-input" name="phone" value="+7" required>
                                @endif
                                <input type="hidden" name="weight" class="hidden-weight">
                                <input type="hidden" name="type" class="hidden-type">
                                <input type="hidden" name="metal" class="hidden-metal">
                                <input type="hidden" name="price" class="hidden-price">
                                <input type="hidden" name="text" class="hidden-message">
                                <button type="button" class="sell-app-submit">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>