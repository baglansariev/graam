@extends('layouts.personal')
@section('content')
    <script>
        $(function () {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function () {
                }
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

<div id="deals" class="infinite-scroll">
        <table class="table orders-table">
            <thead>
                <tr>
                    <th class="first-col" scope="col">Номер</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Металл, проба</th>
                    <th scope="col">Вес, г</th>
                    <th scope="col">Через</th>
                    <th scope="col">Сумма, ₽</th>
                    <th scope="col">Статус</th>
                </tr>
            </thead>
            <tbody>
                @if(count($transactions))
                    @foreach ($transactions as $transaction)

                        <tr class="order-link">
                            <td class="first-col" scope="row">{{ $transaction['id'] }}</td>
                            <td>{{ $transaction['created_at'] }}</td>
                            <td>{{ $transaction['material'] . ' ' . $transaction['content'] }}</td>
                            <td>{{ $transaction['weight'] }}</td>
                            <td><img src="images/pictogram.png" alt=""> ПЮДМ</td>
                            <td>{{ $transaction['sum'] }}</td>
                            <td>{{ $transaction['status'] }}</td>
                        </tr>

                    @endforeach
                @else
                    <tr class="order-link">
                        <td colspan="7" class="text-center">У вас пока нет заявок</td>
                    </tr>
                @endif

            </tbody>
        </table>

        <div class="load"></div>

         @component('modules.orders.detail')
         @endcomponent
@endsection
</div>

