@extends('layouts.main')

@section('title', $title)

@section('content')

    <h3>Добавить новую книгу</h3>

    <form action="{{ route('books.store') }}" method="post">
        @csrf
        <input name="authorId" type="hidden" value="{{ $authorId }}">
        <input name="name" type="text"> Название книги<br>
        <input name="year" type="number"> Год издания<br>
        <input type="submit" value="Сохранить">
    </form>

@endsection


