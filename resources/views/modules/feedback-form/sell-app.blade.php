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
                        <div class="content d-flex flex-column align-items-center">
                            <div class="title">
                                <h3>Заявка на продажу</h3>
                            </div>
                            <div class="subtitle">
                                50 г золота 585 пробы через ПЮДМ
                            </div>
                            <div class="alert modal-popup-alert" role="alert">
                                <span class="message"></span>
                            </div>
                            <form action="{{ route('sell-app') }}" class="popup-form d-flex flex-column">
                                <input type="text" class="name-input" name="name" placeholder="Имя" required>
                                <input type="text" class="phone-input" name="phone" value="+7" required>
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