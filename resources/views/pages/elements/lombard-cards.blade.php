@php($metal_name = 'gold')
@foreach($pawnshops as $pawnshop)
    <div class="card animated animatedFadeInUp">
        <div class="card-wrapper d-flex flex-column">
            <div class="card-title d-flex align-items-center flex-column">
                <div class="lombard-card-logo d-flex align-items-center">
                    <p class="mr-1">G</p>
                    <p>Надежный</p>
                </div>
                <p class="company-name">{{ $pawnshop->name }}</p>
            </div>
            <div class="card-offer">
                <div class="general-price">
{{--                    @if (isset($pawnshop->price_585) && $metal_name !== 'silver')--}}
{{--                        <div class="lombard-price d-flex align-items-end">--}}
{{--                            <span class="price_585 mr-3">{{ number_format($pawnshop->price_585, 0, '', ' ') }} ₽</span>--}}
{{--                            <span>585 пр.</span>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if (isset($pawnshop->price_999))--}}
{{--                        <div class="lombard-price d-flex align-items-end">--}}
{{--                            <span class="price_999 mr-3">{{ number_format($pawnshop->price_999, 0, '', ' ') }} ₽</span>--}}
{{--                            <span>999 пр.</span>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if (isset($pawnshop->price_925) && $metal_name == 'silver')--}}

{{--                        <div class="lombard-price d-flex align-items-end">--}}
{{--                            <span class="price_925 mr-3">{{ number_format($pawnshop->price_925, 0, '', ' ') }} ₽</span>--}}
{{--                            <span>925 пр.</span>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <div class="lombard-price d-flex align-items-end">
                        <span class="price_585 mr-3">4 275 ₽</span>
                        <span>585 пр.</span>
                    </div>
                    <div class="lombard-price d-flex align-items-end">
                        <span class="price_999 mr-3">4 275 ₽</span>
                        <span>999 пр.</span>
                    </div>
                    <div class="lombard-price d-flex align-items-end">
                        <span class="price_925 mr-3">4 275 ₽</span>
                        <span>925 пр.</span>
                    </div>
                </div>
            </div>
            <div class="card-actions d-flex flex-column justify-content-center">
                <div class="phone">
                    <p><a href="tel:{{ str_replace([' ', '(', ')', '-'], '', $pawnshop->phone) }}">{{ $pawnshop->phone }}</a></p>
                </div>
                <div class="apply text-left mb-3">
                    <button type="button" class="sell-app d-flex">Оставить заявку</button>
                </div>
                <div class="address text-left">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $pawnshop->address }}</span>
                </div>
            </div>
        </div>
    </div>
@endforeach