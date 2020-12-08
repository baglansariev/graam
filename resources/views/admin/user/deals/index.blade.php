@extends('layouts.app')

@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Название</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата создания</th>
            </tr>
        </thead>
        <tbody>
            @if ($deals)
                @foreach($deals as $deal)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $deal['name'] }}</td>
                        <td>{{ $deal['status'] }}</td>
                        <td>{{ $deal['created_at'] }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center">У вас пока нет сделок.</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection