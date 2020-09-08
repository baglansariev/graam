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
            <tr class="order-link">
                <td class="first-col" scope="row">1234</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td>У менеджера</td>
            </tr>
            <tr class="order-link">
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr>
            
            </tbody>
        </table>
         @component('modules.orders.detail')
         @endcomponent
@endsection

