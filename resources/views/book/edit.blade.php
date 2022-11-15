@extends('layouts.main')

@section('title', $title)

@section('content')

    <h3>Редактирование:</h3>

    <form action="{{ route('books.update', ['book' => $book->id]) }}" method="post">
        @csrf
        @method('PUT')
        <input name="name" type="text" value="{{ $book->name }}"><br>
        <input name="year" type="number" value="{{ $book->year }}"><br>
        <input type="submit" value="Сохранить">
    </form>

    <a href="{{ route('authors.show', ['author' => $book->author->id]) }}">Назад</a>

@endsection


