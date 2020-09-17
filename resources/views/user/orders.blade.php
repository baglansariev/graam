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
<h2 class="orders-heading">Сделки по &nbsp;
    <div class="select">
        <div class="chosen d-flex">
            <div class="chosen-container">
                <span class="buysell" data-name="продаже">продаже</span>
            </div>
            <i class="fas fa-sort-down orders-fas"></i>
        </div>
        @component('modules.modals.buysell-modal')
        @endcomponent
    </div>
</h2>
<div class="row filters">
    <span class="shown">Показано 50 сделок</span>

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
<div id="deals" class="list-view">

    <div class="list-heading">
        <span class="first-col list-heading-item deal-num">Номер</span>
        <span class="list-heading-item list-deal-date">Дата создания</span>
        <span class="list-heading-item deal-material">Металл, проба</span>
        <span class="list-heading-item weight-price">Вес, г</span>
        <span class="list-heading-item factory">Через</span>
        <span class="list-heading-item list-price">Сумма, ₽</span>
        <span class="list-heading-item deal-status">Участвовать в сделке</span>
    </div>
    @if(count($transactions))
    @foreach ($transactions as $transaction)
    <div class="item">
        <div class="caption">
            <span class="first-col deal-num">#{{ $transaction['id'] }}</span>
            <span class="list-deal-date">{{ $transaction['created_at'] }}</span>
            <span class="deal-material">{{ $transaction['material'] . ' ' . $transaction['content'] }} <b>пр</b></span>
            <span class="weight-price"><span class="weight">{{ $transaction['weight'] }} <b>г</b></span> <span class="sum-price">{{ $transaction['sum'] }} <b>₽</b></span></span>
            <span class="grid-deal-date"><span class="grid-text-title">Дата создания</span> {{ $transaction['created_at'] }}</span>
            <span class="factory"><span class="grid-text-title">Через </span><img src="/images/pictogram.png" alt=""> ПЮДМ</span>
            <span class="list-price">{{ $transaction['sum'] }}</span>
            <span class="deal-status"><a class="join">Участвовать в сделке</a></span>
<!--            <span class="deal-status">{{ $transaction['status'] }}</span>-->
        </div>
    </div>
    @endforeach
    @else
    <div class="no-orders">
        <span class="text-center">У вас пока нет заявок</span>
    </div>
    @endif        
    <script>
        $(document).ready(function() {
            let inProgress = false; // статус процесса загрузки
            let page = 1; // страница
            let typeOfDeal = '';
            let chosen = $('.chosen span');
            let chosenName = chosen.data('name');
            let sortBy = $('.sort-select').val();
            
            if (chosenName == "продаже") {
                typeOfDeal = "2,4"
            } else {
                typeOfDeal = "1,3"
            }
            //        
            $('.personal-content-wrapper').scroll(function() {
                if ($('.personal-content-wrapper').scrollTop() >= ($('.personal-content-wrapper').height() - 1) && !inProgress) {
                    console.log("Условие выполнено")

                    $.ajax({
                        url: '/admin/transactions', // путь к ajax-обработчику
                        method: 'GET',
                        data: {
                            pagination: true,
                            page: page,
                            type: typeOfDeal,
                            sortby: sortBy
                        },
                        beforeSend: function() {
                            inProgress = true;
                        }
                    }).done(function(data) {
                        
                        data = jQuery.parseJSON(data); // данные в json
                        console.log(data.length)
                        if (data.length > 0) {
                            // добавляем записи в блок в виде html
                            $.each(data, function(index, data) {
                                $("#deals").append("<div class='item'><div class='caption'><span class='first-col deal-num'>#" + data.id + "</span><span class='list-deal-date'>" + data.created_at + "</span><span class='deal-material'>" + data.material + " " + data.content + "<b>пр</b></span><span class='weight-price'><span class='weight'>" + data.weight + "<b>г</b></span><span class='sum-price'>" + data.sum + "<b>₽</b></span></span><span class='grid-deal-date'><span class='grid-text-title'>Дата создания</span>" + data.created_at + "</span><span class='factory'><span class='grid-text-title'>Через </span><img src='/images/pictogram.png' alt=''> ПЮДМ</span><span class='list-price'>" + data.sum + "</span><span class='deal-status'>" + data.status + "</span></div></div>");
                            });
                            inProgress = false;
                            page += 1;
                        }
                    });
                }
            });
        });

    </script>

</div>
@component('modules.modals.join')
    @endcomponent
@component('modules.orders.detail')
@endcomponent
@endsection
