@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Личный кабинет</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="welcome-text">
                        <p>
                            Добро пожаловать!<br>
                            <b>{{ Auth::user()->email }}</b>
                        </p>
                    </div>
                    <div class="manager-block d-flex flex-column align-items-end">
                        <div class="block-title">
                            <p>Ваш менеджер:</p>
                        </div>
                        <div class="block-image" style="margin-bottom: 10px;">
                            <img src="{{ $manager['photo'] }}" alt="" style="width: 250px">
                        </div>
                        <div class="block-details">
                            <ul>
                                <li><b>ФИО:</b> {{ $manager['name'] }}</li>
                                <li><b>Телефон:</b> {{ $manager['phone'] }}</li>
                                <li><b>E-mail:</b> {{ $manager['email'] }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
