@extends('layouts.app')

@section('content')

    <div class="user-documents">
        <ul>
            @if($documents->count())
                @foreach($user->documents as $document)
                    <li class="d-flex justify-content-between">
                        <span>{{ $document->name }}:</span>
                        <div class="d-flex">
                            <a href="{{ url($document->path) }}" target="_blank" class="mr-1">Просмотр</a> /
                            <a href="{{ route('documents.edit', $document->id) }}" class="ml-1">Изменить</a>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="d-flex justify-content-center">
                    <span class="mr-1">У вас пока нет документов</span>
                </li>
            @endif
        </ul>
        <div class="action text-right mt-5">
            <a href="{{ route('documents.create') }}" class="btn btn-primary">Добавить</a>
        </div>
    </div>

    <style>
        .user-documents ul li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dashed #cdcdcd;
        }
        .user-details ul li span {
            margin-right: 10px;
        }
    </style>

@endsection