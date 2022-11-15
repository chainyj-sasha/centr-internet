@extends('layouts.main')

@section('title', $title)

@section('content')

    <h3>Добавить автора</h3>

    <form action="{{ route('authors.store') }}" method="post">
        @csrf
        <input name="name" type="text"> Введите ФИО<br>
        <input type="submit" value="Сохранить">
    </form>

@endsection
