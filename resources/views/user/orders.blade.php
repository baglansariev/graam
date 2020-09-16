@extends('layouts.personal')
@section('content')
<script>
    $(document).ready(function() {
        $('#list').click(function(event) {
            event.preventDefault();
            $('#deals').removeClass('grid-view').addClass('list-view');
            $('.personal-content').removeClass('no-shadow');
        });
        $('#grid').click(function(event) {
            event.preventDefault();
            $('#deals').removeClass('list-view').addClass('grid-view');
            $('.personal-content').addClass('no-shadow');
        });
    });

</script>
<h2 class="orders-heading">Сделки по
    <div class="select">
        <div class="chosen d-flex">
            <div class="chosen-container">
                <span data-name="" data-type=""> &nbsp;продаже</span>
            </div>
            <i class="fas fa-sort-down"></i>
        </div>
        <div class="modal-options-wrapper">
            <div class="options-block d-flex justify-content-center">
                <div class="modal-options-close">
                    <span></span>
                    <span></span>
                </div>
                <div class="options-content d-flex align-items-center flex-column">
                    <div class="modal-options">
                        <div class="select">
                            <div class="opts">
                                <div class="opt selected d-flex align-items-center">
                                    <span> &nbsp;продаже</span>
                                </div>
                                <div class="opt d-flex justify-content-between align-items-center" data-name="" data-type="">
                                    <span> &nbsp;покупке</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</h2>
<div class="row filters">
    <span class="shown">Показано 50 сделок</span>

    <div class="btn-group">
        <div class="sortby d-flex">Сортировать
            <div class="select">
                <div class="chosen d-flex">
                    <div class="chosen-container">
                        <span data-name="" data-type=""> &nbsp;по весу</span>
                    </div>
                    <i class="fas fa-sort-down"></i>
                </div>
            </div>
        </div>
        <a href="#" id="list" class="btn btn-default btn-sm"><img src="/images/list-icon.png" alt=""></a>
        <a href="#" id="grid" class="btn btn-default btn-sm"><img src="/images/grid-icon.png" alt=""></a>
    </div>
</div>
<div id="deals" class="list-view">

    <div class="list-heading">
        <span class="first-col list-heading-item">Номер</span>
        <span class="list-heading-item">Дата создания</span>
        <span class="list-heading-item">Металл, проба</span>
        <span class="list-heading-item">Вес, г</span>
        <span class="list-heading-item">Через</span>
        <span class="list-heading-item">Сумма, ₽</span>
        <span class="list-heading-item">Статус</span>
    </div>
    @if(count($transactions))
    @foreach ($transactions as $transaction)
    <div class="item">
        <div class="caption">
            <span class="first-col deal-num">#{{ $transaction['id'] }}</span>
            <span class="list-deal-date">{{ $transaction['created_at'] }}</span>
            <span class="deal-material">{{ $transaction['material'] . ' ' . $transaction['content'] }} пр</span>
            <span class="weight-price"><span class="weight">{{ $transaction['weight'] }} г</span> <span class="sum-price">{{ $transaction['sum'] }} ₽</span></span>
            <span class="grid-deal-date"><span class="grid-text-title">Дата создания</span> {{ $transaction['created_at'] }}</span>
            <span class="factory"><span class="grid-text-title">Через </span><img src="/images/pictogram.png" alt=""> ПЮДМ</span>
            <span class="list-price">{{ $transaction['sum'] }}</span>
            <span class="deal-status">{{ $transaction['status'] }}</span>
        </div>
    </div>
    @endforeach
    @else
    <span class="order-link d-block text-center">
        <span>У вас пока нет заявок</span>
    </span>
    @endif

    <script>
        $(document).ready(function() {
            var inProgress = false; // статус процесса загрузки
            var page = 1; // страница
            //        
            $('.personal-content-wrapper').scroll(function() {


                if ($('.personal-content-wrapper').scrollTop() >= ($('.personal-content-wrapper').height() - 100) && !inProgress) {
                    console.log("Условие выполнено")

                    $.ajax({
                        url: '/admin/transactions', // путь к ajax-обработчику
                        method: 'GET',
                        data: {
                            pagination: true,
                            page: page
                        },
                        beforeSend: function() {
                            inProgress = true;
                        }
                    }).done(function(data) {
                        console.log("Данные получены")
                        data = jQuery.parseJSON(data); // данные в json
                        if (data.length > 0) {
                            // добавляем записи в блок в виде html
                            $.each(data, function(index, data) {
                                $("#deals").append("<div class='item'><div class='caption'><span class='first-col deal-num'>#" + data.id + "</span><span class='list-deal-date'>" + data.created_at + "</span><span class='deal-material'>" + data.material + " " + data.content + "пр</span><span class='weight-price'><span class='weight'>" + data.weight + "г</span><span class='sum-price'>" + data.sum + "₽</span></span><span class='grid-deal-date'><span class='grid-text-title'>Дата создания</span>" + data.created_at + "</span><span class='factory'><span class='grid-text-title'>Через </span><img src='/images/pictogram.png' alt=''> ПЮДМ</span><span class='list-price'>" + data.sum + "</span><span class='deal-status'>" + data.status + "</span></div></div>");
                            });
                            inProgress = false;
                            page += 1;
                        }
                    });
                }
            });
        });

    </script>
    @component('modules.orders.detail')
    @endcomponent
    @endsection
</div>
