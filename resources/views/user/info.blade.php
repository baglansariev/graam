@extends('layouts.personal')
@section('content')

         <h2 class="orders-heading">Личные данные</h2>

         <form class="col-md-12 info">
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="company">Компания</label>
                     <input type="text" class="form-control" id="company" value="Рога и копыта">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="inputEmail4">Электронная почта</label>
                     <input type="email" class="form-control" id="inputEmail4" value="test@test.ru">
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="name">Имя и фамилия</label>
                     <input type="text" class="form-control" id="name" value="Александр Александров">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="inputPassword4">Пароль</label>
                     <input type="password" class="form-control" id="inputPassword4" value="*********">
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="phone">Телефон</label>
                     <input type="phone" class="form-control" id="phone" value="+7 999 999 99 99">
                 </div>
                 <div class="form-group col-md-6">
                     <label class="soc-label">Связанные аккаунты</label>
                     <div class="soc-icons">
                         <img src="/images/insta.svg" alt="Instagram" title="Instagram">
                         <img src="/images/fb.svg" alt="Facebook" title="Facebook">
                         <img src="/images/vk.svg" alt="VKontakte" title="VKontakte">
                     </div>
                 </div>

             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="bday">Дата рождения</label>
                     <input type="date" class="form-control" id="bday">
                 </div>
                 <div class="form-group col-md-6">

                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="inputCity">Город</label>
                     <input type="text" class="form-control" id="inputCity" value="Москва">
                 </div>
                 <div class="form-group col-md-6">

                 </div>
             </div>

             <button type="submit" class="btn btn-primary disabled">Сохранить</button>
         </form>
@endsection
