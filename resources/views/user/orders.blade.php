@extends('layouts.personal')
@section('content')

         <h2 class="orders-heading">Заявка на продажу сформирована</h2>
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
         @component('modules.orders.detail')
         @endcomponent
@endsection

