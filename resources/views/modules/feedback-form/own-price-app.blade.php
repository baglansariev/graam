<div class="modal-popup modal-own-price">
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
                            <form action="" class="popup-form d-flex flex-column">
                                <div class="price-input-container d-flex align-items-center">
                                    <input type="number" class="price-input" name="price" placeholder="Цена" required>
                                    <span>₽</span>
                                </div>
                                @auth
                                    <input type="text" class="name-input" name="name" placeholder="Имя" value="{{ Auth::user()->detailsFromCrm()->name ?? '' }}" @if(isset(Auth::user()->detailsFromCrm()->name)) disabled @endif required>
                                    <input type="text" class="phone-input" name="phone" value="{{ Auth::user()->detailsFromCrm()->phone ?? '+7' }}" @if(isset(Auth::user()->detailsFromCrm()->phone)) disabled @endif required>
                                @endauth
                                @guest
                                    <input type="text" class="name-input" name="name" placeholder="Имя" required>
                                    <input type="text" class="phone-input" name="phone" value="+7" required>
                                @endguest
                                <input type="hidden" name="weight" class="hidden-weight">
                                <input type="hidden" name="type" class="hidden-type">
                                <input type="hidden" name="metal" class="hidden-metal">
                                <input type="hidden" name="text" class="hidden-message">
                                <button type="button" class="own-price-submit">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>