@extends('layouts.app')

@section('content')
    <div class="user-documents">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Название</th>
                <th scope="col">Документы</th>
            </tr>
            </thead>
            <tbody>
            @if($user->documents()->count())
                @foreach($document_categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td>
                            @if($user->documents()->whereCategoryId($category->id)->count())
                                @foreach($user->documents()->whereCategoryId($category->id)->get() as $document)
                                    <div class="d-flex">
                                        <a href="{{ route('documents.show', $document->id) }}" target="_blank" class="mr-1">{{ $document->name }}</a> /
                                        <a href="{{ route('documents.edit', $document->id) }}" class="ml-1">Изменить</a>
                                    </div>
                                @endforeach
                            @else
                                Файл не загружен
                            @endif
                        </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center">У вас пока нет документов</td>
                        </tr>
                    @endif
            </tbody>
        </table>
        <div class="action text-right mt-5">
            <a href="{{ route('documents.create') }}" class="btn btn-primary">Добавить</a>
        </div>
    </div>

@endsection