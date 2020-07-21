@extends('layouts.app')

@section('content')

    <form action="{{ route('documents.update', $document->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group">
            <label for="selectNames">Название документа:</label>
            <select name="doc_category" id="selectNames" class="form-control" required>
                @foreach($doc_categories as $category)
                    @if($document->category->name == $category->name)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
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