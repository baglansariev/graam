@if (!empty($offers))
    @foreach($offers as $offer)
        <div class="card animated animatedFadeInUp">
            <div class="card-wrapper">
                <div class="card-title d-flex align-items-center">
                    <img src="{{ asset('images/graam_logo.png') }}" alt="" class="card-logo">
                    <p>{{ $offer['company_name'] }}</p>
                </div>
                <div class="card-offer">
                    <div class="price">
                        {{ number_format($offer['price'], 0, '', ' ') }} ₽
                    </div>
                    <div class="time">
                        через {{ $offer['duration'] }} дня
                    </div>
                </div>
                <div class="card-actions d-flex flex-column justify-content-center">
                    <!--<button type="button">Позвонить</button>-->
                    <!--<a href="">
                        <i class="fab fa-telegram-plane"></i>
                        <span>Написать в телеграм</span>
                    </a>-->
                    <div class="phone">
                        <p>+7 812 123-45-67</p>
                    </div>
                    <div class="apply text-left">
                        <button type="button" class="sell-app d-flex">Оставить заявку</button>
                    </div>
                </div>
                <div class="card-details">
                    <ul>
                        <li>Наличный и б/н расчет</li>
                        <li>Транспортировка входит в цену</li>
                        <li>Фиксация цены</li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
@endif