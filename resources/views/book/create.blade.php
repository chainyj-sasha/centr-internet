@extends('layouts.main')

@section('title', $title)

@section('content')

    <h3>Добавить новую книгу</h3>

    <p>Выберите одного или несколько авторов из списка:</p>

    <form action="{{ route('books.store') }}" method="post">
        @csrf

        <p>
            <select name="authorsId[]" size="10" multiple>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </p>

        <input name="name" type="text"> Название книги<br>
        <input name="year" type="number"> Год издания<br>
        <input type="submit" value="Сохранить">
    </form>

@endsection


