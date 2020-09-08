@extends('layouts.personal')
@section('content')

         <h2 class="orders-heading">Дисконт — это разница между ценой металла&nbsp;по&nbsp;бирже&nbsp;и&nbsp;стоимостью ее покупки</h2>
         <div class="container row discount-info-wrapper">
             <div class="col-sm-6">
                 <div class="row d-flex discount-info">
                 <span class="procent">-4%</span>
                 <span class="discount-text">Ваш средний<br>дисконт</span>
                 </div>
             </div>
             <div class="col-sm-6">
                 <div class="row d-flex discount-info">
                 <span class="procent">-3,5%</span>
                 <span class="discount-text">Предложение<br>от <img src="/images/pictogram-big.png" alt=""> ПЮДМ</span>
                 </div>
                 <div class="row">
                     <a class="discuss">Обсудить</a>
                 </div>
             </div>
         </div>
        <table class="table orders-table">
            <thead>
            <tr>
                <th class="first-col" scope="col">Номер</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Металл, проба</th>
                <th scope="col">Вес, г</th>
                <th scope="col">Через</th>
                <th scope="col">Сумма, ₽</th>
                <th scope="col">Дисконт</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="first-col" scope="row">1234</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td>-5</td>
            </tr>
            <tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td>-2</td>
            </tr>
            
            </tbody>
        </table>

@endsection
