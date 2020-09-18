@extends('layouts.personal')
@section('content')
         

         <h2 class="orders-heading">Личные данные</h2>
         
         @if(session('success_msg'))          
            <div class="alert">{{ session('success_msg') }}</div>            
        @endif

         <form action="{{ route('user.update', $user->id) }}" method="post" class="col-md-12 info">
             @csrf
             <input type="hidden" name="_method" value="PUT">
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="company_name">Компания</label>
                     <input type="text" class="form-control" id="company_name" name="company_name" @if (isset($user_details->entity_type) && $user_details->entity_type == 2) disabled @endif value="{{ $user_details->company_name ?? 'Название компании'}}">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="inputEmail4">Электронная почта</label>
                     @if (isset($user_details->email) && !empty($user_details->email))
                         <input type="email" name="email" class="form-control" id="email" value="{{ $user_details->email }}">
                     @else
                         <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                     @endif
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="name">Имя и фамилия</label>
                     <input name="name" type="text" class="form-control" id="name" value="{{ $user->name ?? $user_details->company_name }}">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="inputPassword4">Пароль</label>
                     <input type="password" class="form-control" id="inputPassword4" placeholder="*********">
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="phone">Телефон</label>
                     <input type="text" name="phone" class="form-control" id="phone" value="{{ $user_details->phone ?? $user->phone ?? '+7 999 999 99 99' }}">
                 </div>
                 <div class="form-group col-md-6">
<!--
                     <label class="soc-label">Связанные аккаунты</label>
                     <div class="soc-icons">
                         <img src="/images/insta.svg" alt="Instagram" title="Instagram">
                         <img src="/images/fb.svg" alt="Facebook" title="Facebook">
                         <img src="/images/vk.svg" alt="VKontakte" title="VKontakte">
                     </div>
-->
                 </div>

             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="bday">Дата рождения</label>
                     <input type="date" class="form-control" id="bday" name="birth_date" value="{{ date('Y-m-d', strtotime($user_details->birth_date ?? $user->birth_date ?? strftime('now'))) }}">
                 </div>
                 <div class="form-group col-md-6">

                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="inputCity">Город</label>
                     <input type="text" class="form-control" id="inputCity" value="{{ $user_details->city ?? $user->city ?? 'Москва' }}" name="city">
                 </div>
                 <div class="form-group col-md-6">

                 </div>
             </div>

             <button type="submit" class="btn btn-primary disabled">Сохранить</button>
         </form>
@endsection
