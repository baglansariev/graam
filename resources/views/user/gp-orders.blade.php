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
<h2 class="orders-heading">Открытые заявки по&nbsp;
    <div class="select">
<div class="chosen d-flex">
           <div class="chosen-container">
                <span class="buysell" data-name="продаже" style="cursor: pointer">продаже</span>
          </div>
        <i class="fas fa-sort-down orders-fas"></i>
       </div>
<!--
        <div class="d-flex">
            <div class="chosen-container">
                <span class="buysell" data-name="продаже" style="cursor: pointer">продаже</span>
            </div>
        </div>
-->
        @component('modules.modals.buysell-modal')
        @endcomponent
    </div>
</h2>
<div class="row filters">
    <span class="shown">Показано <span>{{ $transactions_count }}</span> сделок</span>

    <div class="btn-group">

        <div class="sortby d-flex">Сортировать &nbsp;
            <div class="select">
                   <div class="select-arrow"></div>
                    <select name="sort-filter" class="sort-select">
                        <option value="weight" selected><span>по весу</span></option>
                        <option value="price"><span>по цене</span></option>
                    </select>
            </div>
        </div>


        <a href="#" id="list" class="btn btn-default btn-sm active"><img src="/images/list-icon.png" alt=""></a>
        <a href="#" id="grid" class="btn btn-default btn-sm"><img src="/images/grid-icon.png" alt=""></a>
    </div>
</div>
<div id="deals" data-type="gp" class="list-view">

    <div class="list-heading">
        <span class="first-col list-heading-item deal-num">Номер</span>
        <span class="list-heading-item list-deal-date">Дата создания</span>
        <span class="list-heading-item deal-material">Металл, проба</span>
        <span class="list-heading-item weight-price">Вес, г</span>
        <span class="list-heading-item factory">Через</span>
{{--        <span class="list-heading-item list-price">Сумма, ₽</span>--}}
        <span class="list-heading-item list-price">Цена, ₽</span>
        <span class="list-heading-item deal-status">Участвовать в сделке</span>
    </div>    
@if(count($transactions))
    @foreach ($transactions as $transaction)
    <div class="item">
        <div class="caption" data-tr_id="{{ $transaction['id'] }}" data-external_id="{{ $user->id }}" data-crm_id="{{ $user->crm_id ?? 0 }}" data-name="{{ $user->name ?? $user_details->name }}" data-phone="{{ $user->phone ?? $user_details->phone }}" data-weight="{{ $transaction['weight'] }}" data-price="{{ $transaction['price'] }}" data-metal="{{ $transaction['material'] }}" data-type="{{ $transaction['content'] }}">
            <span class="first-col deal-num">#{{ $transaction['id'] }}</span>
            <span class="list-deal-date">{{ $transaction['created_at'] }}</span>
            <span class="deal-material">{{ $transaction['material'] . ' ' . $transaction['content'] }}</span>
            <span class="weight-price"><span class="weight">{{ $transaction['weight'] }} <b>г</b></span> <span class="sum-price">{{ $transaction['price'] }} <b>₽</b></span></span>
            <span class="grid-deal-date"><span class="grid-text-title">Дата создания&nbsp;</span> {{ $transaction['created_at'] }}</span>
            <span class="factory"><span class="grid-text-title">Через </span><img src="/images/pictogram.png" alt=""> ПЮДМ</span>
<!--           <span class="list-price"></span>-->
            <span class="list-price">{{ $transaction['price'] }}</span>
            @if ($transaction['deal_type'] == 'sell')
            
                <span class="deal-status"><a class="join">Участвовать в покупке</a></span>
            @else
               
                <span class="deal-status"><a class="join">Участвовать в продаже</a></span>
            @endif
<!--            <span class="deal-status">{{ $transaction['status'] }}</span>-->
        </div>
    </div>
<!--    <span>{{ $transaction['deal_type'] }}</span>-->
    @endforeach
    @else 
    <div class="no-orders">
       <span class="text-center">У вас пока нет заявок</span>
        <span class="text-center">Скоро появятся актуальные заявки</span>
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
              document.getElementByClassName('personal-content').classList.add('no-shadow');
        }
    </script>
@component('modules.orders.detail')
@endcomponent
@endsection
