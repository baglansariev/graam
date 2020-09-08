@extends('layouts.personal')
@section('content')

         <h2 class="orders-heading">Загружен 1 из 10 документов</h2>
         <div class="container docs">
             <div class="row">
                 <div class="col-sm-12">
                     <div class="popup-content d-flex justify-content-center">
                         <div class="content d-flex flex-column align-items-start">
                             <div class="order-infos">
                                 <ul class="order-infos-list">
                                     @foreach($docs as $doc)


                                     <li class="order-infos-list-item">
                                         <span class="list-item-heading">Учетная карточка контрагента ЮЛ/ИП</span>
                                         <span><a href="{{ $doc['path'] }}">{{ $doc['name'] }}</a></span>
                                     </li>

                                     @endforeach



                                     <li class="order-infos-list-item done">
                                         <span class="list-item-heading">Анкета ЮЛ/ИП</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия свидетельства ОГРН/ОГРНИП ЮЛ (если регистрация прошла до 01.01.2017г.) /ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия свидетельства ИНН ЮЛ/ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия уведомления о поставке на спец. учет (со всеми изменениями) ЮЛ/ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия карты спец. учета ЮЛ/ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия уведомления статистики ЮЛ/ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия решения или протокола о создании ЮЛ ЮЛ</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия решения или протокола о назначении ген. директора ЮЛ</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия приказа о назначении ген. директора ЮЛ</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия паспорта ген. Директора ЮЛ/ ИП ЮЛ/ИП</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                     <li class="order-infos-list-item disabled">
                                         <span class="list-item-heading">Скан-копия Устава ЮЛ ЮЛ</span>
                                         <span><a href="">Загрузить файл</a> doc, pdf</span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

@endsection
