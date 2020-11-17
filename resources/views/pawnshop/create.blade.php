@extends('layouts.app')

@section('content')

    <form action="{{ route('pawnshop.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnName">Название</label>
                    <input id="inputPawnName" name="name" type="text" class="form-control" placeholder="Название" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnPhone">Телефон</label>
                    <input id="inputPawnPhone" name="phone" type="text" class="form-control" placeholder="Телефон" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnAddr">Адрес</label>
                    <input id="inputPawnAddr" name="address" type="text" class="form-control" placeholder="Адрес" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnLink">Ссылка</label>
                    <input id="inputPawnLink" name="link" type="text" class="form-control" placeholder="Ссылка">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnLong">Долгота (координаты)</label>
                    <input id="inputPawnLong" name="longitude" type="text" class="form-control" placeholder="Долгота (координаты)">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnLat">Широта (координаты)</label>
                    <input id="inputPawnLat" name="latitude" type="text" class="form-control" placeholder="Широта (координаты)">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnNote">Комментарий</label>
                    <input id="inputPawnNote" name="notes" type="text" class="form-control" placeholder="Комментарий">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnImg">Логотип (изображение)</label>
                    <input id="inputPawnImg" name="image" type="file" class="form-control" placeholder="Логотип (изображение)">
                </div>
            </div>
        </div>
        <div class="form-group text-right mt-4">
            <button type="submit" class="btn btn-success mr-1">Добавить</button>
            <a type="submit" class="btn btn-danger" href="{{ route('pawnshop.index') }}">Отменить</a>
        </div>
    </form>

@endsection