@extends('layouts.app')

@section('content')

    @if (session()->has('msg_success'))
        <div class="card-alert alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('msg_success') }}
            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </a>
        </div>
    @endif

    @if (session()->has('msg_error'))
        <div class="card-alert alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('msg_error') }}
            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </a>
        </div>
    @endif
    <div class="panel-actions text-right">
        <a href="{{ route('pawnshop.create') }}" class="btn btn-success mb-4">Добавить</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Телефон</th>
                <th scope="col">Адрес</th>
                <th scope="col">Действие</th>
            </tr>
        </thead>
        <tbody>
        @if (isset($pawnshops) && $pawnshops->count())
            @foreach($pawnshops as $pawnshop)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $pawnshop->name }}</td>
                    <td>{{ $pawnshop->phone }}</td>
                    <td>{{ $pawnshop->address }}</td>
                    <td class="d-flex">
                        <a href="{{ route('pawnshop.edit', $pawnshop->id) }}" class="btn btn-sm btn-warning mr-1">Изменить</a>
                        <form action="{{ route('pawnshop.destroy', $pawnshop->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center">У вас пока нет ломбардов</th>
            </tr>
        @endif
        </tbody>
    </table>

@endsection