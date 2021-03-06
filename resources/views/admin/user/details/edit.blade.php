@extends('layouts.app')

@section('content')

    <form action="{{ route('details.update', $user->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Ф.И.О.</label>
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Ф.И.О." value="{{ $user->details->name ?? '' }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputInn">ИНН</label>
                <input type="number" name="inn" class="form-control" id="inputInn" placeholder="ИНН" value="{{ $user->details->inn ?? '' }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCompanyName">Название компании</label>
            <input type="text" name="company_name" class="form-control" id="inputCompanyName" placeholder="Название компании" value="{{ $user->details->company_name ?? '' }}">
        </div>
        <div class="form-group">
            <label for="inputAddress">Юридический адрес</label>
            <input type="text" class="form-control" name="company_address" id="inputAddress" placeholder="Страна, город, улица, номер дома" value="{{ $user->details->company_address ?? '' }}">
        </div>
        <div class="form-group d-flex justify-content-between mt-5">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <a href="{{ route('details.index') }}" class="btn btn-danger right">Отмена</a>
        </div>
    </form>

@endsection