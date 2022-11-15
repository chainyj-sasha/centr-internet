@extends('layouts.main')

@section('title', $title)

@section('content')

    <h3>Редаткировать автора</h3>

    <form action="{{ route('authors.update', ['author' => $author->id]) }}" method="post">
        @csrf
        @method('PUT')
        <input name="name" type="text" value="{{ $author->name }}"> Введите ФИО<br>
        <input type="submit" value="Сохранить">
    </form>

    <p><a href="{{ route('show_all_authors') }}">На главную</a></p>

@endsection

