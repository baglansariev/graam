@extends('layouts.app')

@section('content')

    <form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="selectNames">Название документа:</label>
            <select name="doc_name" id="selectNames" class="form-control" required>
                @foreach($doc_names as $doc_name)
                    <option value="{{ $doc_name }}">{{ $doc_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="file" name="document" class="form-control" id="inputAddress" required>
        </div>

        <div class="form-group d-flex justify-content-between mt-5">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <a href="{{ route('documents.index') }}" class="btn btn-danger right">Отмена</a>
        </div>
    </form>

@endsection