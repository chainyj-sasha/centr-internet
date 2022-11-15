@extends('layouts.main')

@section('title', $title)

@section('content')

    <h3>Список книг</h3>

    <ul>
        @foreach($books as $book)
            <li>

            </li>
        @endforeach
    </ul>

@endsection
