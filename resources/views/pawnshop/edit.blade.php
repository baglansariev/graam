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
{{--        <div class="form-row">--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="form-group">--}}
{{--                    <label for="inputPawnLong">Долгота (координаты)</label>--}}
{{--                    <input id="inputPawnLong" name="longitude" type="text" class="form-control" placeholder="Долгота (координаты)" value="{{ $pawnshop->longitude ?? '' }}">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="form-group">--}}
{{--                    <label for="inputPawnLat">Широта (координаты)</label>--}}
{{--                    <input id="inputPawnLat" name="latitude" type="text" class="form-control" placeholder="Широта (координаты)" value="{{ $pawnshop->latitude ?? '' }}">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPrice585">Цена в 585 пробе (Золото)</label>
                    <input id="inputPrice585" name="price_gold_585" type="number" class="form-control" placeholder="Цена в 585 пробе" value="{{ $pawnshop->price_gold_585 ?? '' }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPrice925">Цена в 999 пробе (Золото)</label>
                    <input id="inputPrice925" name="price_gold_999" type="number" class="form-control" placeholder="Цена в 999 пробе" value="{{ $pawnshop->price_gold_999 ?? '' }}">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPrice999">Цена в 925 пробе (Серебро)</label>
                    <input id="inputPrice999" name="price_silver_925" type="number" class="form-control" placeholder="Цена в 925 пробе" value="{{ $pawnshop->price_silver_925 ?? '' }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPrice999">Цена в 999 пробе (Серебро)</label>
                    <input id="inputPrice999" name="price_silver_999" type="number" class="form-control" placeholder="Цена в 999 пробе" value="{{ $pawnshop->price_silver_999 ?? '' }}">
                </div>
            </div>
        </div>


        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputLoanPercent">Процент займа в месяц</label>
                    <input id="inputLoanPercent" name="loan_percent" type="number" class="form-control" placeholder="Процент займа" value="{{ $pawnshop->loan_percent }}">
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
        <div class="form-row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="inputPawnNote">Комментарий</label>
                    <textarea id="inputPawnNote" name="notes" class="form-control" placeholder="Комментарий">{{ $pawnshop->notes ?? '' }}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group text-right mt-4">
            <button type="submit" class="btn btn-success mr-1">Сохранить</button>
            <a type="submit" class="btn btn-danger" href="{{ route('pawnshop.index') }}">Отменить</a>
        </div>
    </form>

@endsection