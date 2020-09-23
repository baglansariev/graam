@if (!empty($offers))
    @foreach($offers as $offer)
        @if (!in_array($loop->iteration, [2, 3, 6]))
        <div class="card animated animatedFadeInUp @if(isset($offer['status']) && !$offer['status']) inactive @endif">
            <div class="card-wrapper">
                <div class="card-title d-flex align-items-center">
                    <img src="{{ asset($offer['image']) }}" alt="" class="card-logo">
                    <p>{{ $offer['company_name'] }}</p>
                </div>
                <div class="card-offer">
{{--                    <div class="price">--}}
{{--                        @if ($loop->iteration !== 6)--}}
{{--                            {{ number_format($offer['price'], 0, '', ' ') }} ₽--}}
{{--                        @endif--}}
{{--                    </div>--}}
                    <div class="general-price">
                        @if ($loop->iteration !== 6)
                            @if (isset($offer['price_585']))
                                <div class="gen-price d-flex justify-content-between">
                                    <span>Цена в 585:</span>
                                    <span>{{ number_format($offer['price_585'], 0, '', ' ') }} ₽</span>
                                </div>
                            @endif
                            @if (isset($offer['price_999']))
                                <div class="gen-price d-flex justify-content-between">
                                    <span>Цена в 999:</span>
                                    <span>{{ number_format($offer['price_999'], 0, '', ' ') }} ₽</span>
                                </div>
                            @endif
                            @if (isset($offer['price_925']))
                                <div class="gen-price d-flex justify-content-between">
                                    <span>Цена в 925:</span>
                                    <span>{{ number_format($offer['price_925'], 0, '', ' ') }} ₽</span>
                                </div>
                            @endif
                        @endif
                    </div>
{{--                    <div class="time">--}}
{{--                        {{ $offer['duration'] }}--}}
{{--                    </div>--}}
                </div>
                <div class="card-actions d-flex flex-column justify-content-center">
                    <div class="phone">
                        <p><a href="tel:+79066662701">{{ $offer['phone'] }}</a></p>
                    </div>
                    <div class="apply text-left">
                        @if ($loop->iteration !== 2 && $loop->iteration !== 3)
                            <button type="button" class="sell-app d-flex" @if($loop->index == 4 || $loop->index == 5) style="opacity: 0" disabled @endif>Оставить заявку</button>
                        @endif
                    </div>
                </div>
                <div class="card-details">
                    <ul>
                        @if ($loop->iteration == 1)
                            <li>Транспорт за наш счет</li>
                            <li>Деньги предоплатой</li>
                            <li>Подготовка и оформление документаций</li>
                            <li>Дисконт не зависит от веса металла</li>
                        @elseif (in_array($loop->iteration, [2, 3, 6]))
                            <li>Условия уточняйте у менеджеров по телефону</li>
                        @else
                            <li>Транспорт за счет продавца</li>
                            <li>Самостоятельная подготовка документации</li>
                            <li>Деньги после дня получения паспорта плавки</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @endif
    @endforeach
    <style>
        .gen-price {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #ebebeb;
        }
        .gen-price span:nth-of-type(2) {
            font-size: 22px;
            font-weight: bold;
        }
    </style>
@endif