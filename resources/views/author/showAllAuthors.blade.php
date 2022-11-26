@extends('layouts.main')

@section('title', $title)

@section('content')

    <h3>Список авторов</h3>

    <ul>
        @foreach($authors as $author)
            <li>
                {{ $author->name }}<br>
                <a href="{{ route('authors.show', ['author' => $author->id]) }}">Список книг</a>
                @if(auth()->check())
                    <form action="{{ route('authors.edit', ['author' => $author->id]) }}" method="">
                        <button>Редактировать автора</button>
                    </form><br>
                @endif
            </li>
        @endforeach
    </ul>

    <form action="{{ route('authors.create') }}" method="get">
        <button>Добавить автора</button>
    </form>

@endsection
