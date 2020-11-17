@extends('layouts.app')

@section('content')

    <form action="{{ route('pawnshop.update', $pawnshop->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnName">Название</label>
                    <input id="inputPawnName" name="name" type="text" class="form-control" placeholder="Название" value="{{ $pawnshop->name ?? '' }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnPhone">Телефон</label>
                    <input id="inputPawnPhone" name="phone" type="text" class="form-control" placeholder="Телефон" value="{{ $pawnshop->phone ?? '' }}" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnAddr">Адрес</label>
                    <input id="inputPawnAddr" name="address" type="text" class="form-control" placeholder="Адрес" value="{{ $pawnshop->address ?? '' }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnLink">Ссылка</label>
                    <input id="inputPawnLink" name="link" type="text" class="form-control" placeholder="Ссылка" value="{{ $pawnshop->link ?? '' }}">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnLong">Долгота (координаты)</label>
                    <input id="inputPawnLong" name="longitude" type="text" class="form-control" placeholder="Долгота (координаты)" value="{{ $pawnshop->longitude ?? '' }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnLat">Широта (координаты)</label>
                    <input id="inputPawnLat" name="latitude" type="text" class="form-control" placeholder="Широта (координаты)" value="{{ $pawnshop->latitude ?? '' }}">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnNote">Комментарий</label>
                    <input id="inputPawnNote" name="notes" type="text" class="form-control" placeholder="Комментарий" value="{{ $pawnshop->notes ?? '' }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPawnImg">Логотип (изображение)</label>
                    <div class="image_edit d-flex flex-column align-items-start">
                        <button id="img_change" type="button">
                            <img src="{{ asset($pawnshop->image) }}" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-right mt-4">
            <button type="submit" class="btn btn-success mr-1">Сохранить</button>
            <a type="submit" class="btn btn-danger" href="{{ route('pawnshop.index') }}">Отменить</a>
        </div>
    </form>

@endsection