@extends('layouts.app')

@section('content')

<div class="user-details">
    <ul>
        <li class="d-flex justify-content-between">
            <span>Ф.И.О.:</span>
            <span>{{ $user->details->name ?? 'Не заполнено' }}</span>
        </li>
        <li class="d-flex justify-content-between">
            <span>E-mail:</span>
            <span>{{ $user->email }}</span>
        </li>
        <li class="d-flex justify-content-between">
            <span>ИНН:</span>
            <span>{{ $user->details->inn ?? 'Не заполнено' }}</span>
        </li>
        <li class="d-flex justify-content-between">
            <span>Название компании:</span>
            <span>{{ $user->details->company_name ?? 'Не заполнено' }}</span>
        </li>
        <li class="d-flex justify-content-between">
            <span>Юридический адрес:</span>
            <span>{{ $user->details->company_address ?? 'Не заполнено' }}</span>
        </li>
    </ul>
    <div class="action text-right mt-5">
        <a href="@if($has_details) {{ route('details.edit', $user->id) }} @else {{ route('details.create') }} @endif" class="btn btn-primary">Изменить</a>
    </div>
</div>

<style>
    .user-details ul li {
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px dashed #cdcdcd;
    }
    .user-details ul li span {
        margin-right: 10px;
    }
</style>

@endsection