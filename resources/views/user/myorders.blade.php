@extends('layouts.personal')
@section('content')
<script>
    $(document).ready(function() {
        $('#list').click(function(event) {
            event.preventDefault();
            $('#deals').removeClass('grid-view').addClass('list-view');
            $('.personal-content').removeClass('no-shadow');
            $('#list').addClass('active');
            $('#grid').removeClass('active');
        });
        $('#grid').click(function(event) {
            event.preventDefault();
            $('#deals').removeClass('list-view').addClass('grid-view');
            $('.personal-content').addClass('no-shadow');
            $('#grid').addClass('active');
            $('#list').removeClass('active');
        });
    });
</script>
<h2 class="orders-heading">Сделки по&nbsp;
    <div class="select">
        <div class="chosen d-flex">
            <div class="chosen-container">
                <span class="buysell" data-name="продаже" style="cursor: pointer">продаже</span>
            </div>
            <i class="fas fa-sort-down orders-fas"></i>
        </div>
        @component('modules.modals.buysell-modal')
        @endcomponent
    </div>

</h2>
<div class="row filters">
    <span class="shown">Показано <span>{{ $transactions_count }}</span>  сделок</span>

    <div class="btn-group">

        <div class="sortby d-flex">Сортировать &nbsp;
            <div class="select">
                   <div class="select-arrow"></div>
                    <select name="sort-filter" class="sort-select">
                        <option value="weight" selected><b>по весу</b></option>
                        <option value="price"><b>по цене</b></option>
                    </select>
            </div>
        </div>


        <a href="#" id="list" class="btn btn-default btn-sm active"><img src="/images/list-icon.png" alt=""></a>
        <a href="#" id="grid" class="btn btn-default btn-sm"><img src="/images/grid-icon.png" alt=""></a>
    </div>
</div>
<div id="deals" data-type="private" class="list-view">

    <div class="list-heading">
        <span class="first-col list-heading-item deal-num">Номер</span>
        <span class="list-heading-item list-deal-date">Дата создания</span>
        <span class="list-heading-item deal-material">Металл, проба</span>
        <span class="list-heading-item weight-price">Вес, г</span>
        <span class="list-heading-item factory">Через</span>
{{--        <span class="list-heading-item list-price">Сумма, ₽</span>--}}
        <span class="list-heading-item list-price">Цена, ₽</span>
        <span class="list-heading-item deal-status">Статус</span>
    </div>
    @if(count($transactions))
    @foreach ($transactions as $transaction)
    <div class="item">
        <div class="caption order-link">
            <span class="first-col deal-num">#{{ $transaction['id'] }}</span>
            <span class="list-deal-date">{{ $transaction['created_at'] }}</span>
            <span class="deal-material">{{ $transaction['material'] . ' ' . $transaction['content'] }} <b>пр</b></span>
            <span class="weight-price"><span class="weight">{{ $transaction['weight'] }} <b>г</b></span> <span class="sum-price">{{ $transaction['price'] }} <b>₽</b></span></span>
            <span class="grid-deal-date"><span class="grid-text-title">Дата создания</span> {{ $transaction['created_at'] }}</span>
            <span class="factory"><span class="grid-text-title">Через </span><img src="/images/pictogram.png" alt=""> ПЮДМ</span>
{{--            <span class="list-price">{{ $transaction['sum'] }}</span>--}}
            <span class="list-price">{{ $transaction['price'] }}</span>
            <span class="deal-status">{{ $transaction['status'] }}</span>
        </div>
    </div>
    @endforeach
    @else
    <div class="no-orders">
        <span class="text-center">У вас пока нет заявок</span>
    </div>
    @endif

</div>
<script>
        let screen = window.innerWidth;
        if(screen <= 767) {
            document.getElementById('grid').style.display = 'none';
            document.getElementById('list').style.display = 'none';
              document.getElementById('deals').classList.remove('list-view');
              document.getElementById('deals').classList.add('grid-view');
              document.getElementsByClassName('personal-content').classList.add('no-shadow');
        }
    </script>
@component('modules.orders.detail')
@endcomponent
@endsection
