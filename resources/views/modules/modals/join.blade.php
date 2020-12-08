<div class="modal-popup modal-join">
    <div class="popup-wrapper">
        <div class="popup-close">
            <span></span>
            <span></span>
        </div>

        <div class="container d-block">
            <div class="row">
                <div class="col-sm-12">
                    <div class="popup-content d-flex justify-content-center">
                        <div class="content d-flex flex-column align-items-start">
                          <div class="alert modal-popup-alert" role="alert">                                
                                <span class="message" style="font-size: 18px;">Спасибо за вашу заявку!</span>
                                <h4>Наш менеджер скоро вам позвонит!</h4>
                            </div>
<!--                          -->
                           <form action="{{ route('sell-app') }}" class="popup-form d-flex flex-column">
                            <div class="title">
                                <h3>Вы хотите <span id="tr-action" class="keyword"></span> <input type="text" name="weight" class="hidden-weight" value="" id="weight-in-form"> г<br>
                                    <span id="metall-in-form"></span> <span id="type-in-form"></span> пробы<br>по <span id="price-in-form"></span> ₽/г </h3>
                            </div>
                            
                            
                            
                                @if (Auth::user() && isset(Auth::user()->name) && Auth::user()->name !== '')
<!--                                    <input type="text" class="name-input" name="name_test" value="{{ Auth::user()->name }}" disabled>-->
                                    <input type="hidden" class="name-input" name="name" value="{{ Auth::user()->name }}" required>
                                @elseif(Auth::user() && isset(Auth::user()->detailsFromCrm()->name) && Auth::user()->detailsFromCrm()->name !== '')
<!--                                    <input type="text" class="name-input" name="name_test" value="{{ Auth::user()->detailsFromCrm()->name }}" disabled>-->
                                    <input type="hidden" class="name-input" name="name" value="{{ Auth::user()->detailsFromCrm()->name }}" required>
                                @else
<!--                                    <input type="text" class="name-input" name="name" placeholder="Имя" required>-->
                                @endif

                                @if(isset(Auth::user()->phone) && Auth::user()->phone !== '')
<!--                                    <input type="text" class="phone-input" name="phone_test" value="{{ Auth::user()->phone ?? '+7' }}" disabled>-->
                                    <input type="hidden" class="phone-input" name="phone" value="{{ Auth::user()->phone ?? '+7' }}" required>
                                @elseif (Auth::user() && isset(Auth::user()->detailsFromCrm()->phone) && Auth::user()->detailsFromCrm()->phone !== '')
<!--                                    <input type="text" class="phone-input" name="phone_test" value="{{ Auth::user()->detailsFromCrm()->phone ?? '+7' }}" disabled>-->
                                    <input type="hidden" class="phone-input" name="phone" value="{{ Auth::user()->detailsFromCrm()->phone ?? '+7' }}" required>
                                @else
<!--                                    <input type="text" class="phone-input" name="phone" value="+7" required>-->
                                @endif
                                <input type="hidden" name="weight" class="hidden-weight">
                                <input type="hidden" name="type" class="hidden-type">
                                @auth
                                    <input type="hidden" name="contractor_id" value="{{ Auth::user()->crm_id ?? 0 }}">
                                @endauth
                                <input type="hidden" name="metal" class="hidden-metal">
                                <input type="hidden" name="price" class="hidden-price">
                                <input type="hidden" name="text" class="hidden-message">
                                <button type="button" id="join-submit">Отправить заявку</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>