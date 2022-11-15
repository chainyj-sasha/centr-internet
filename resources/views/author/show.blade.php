@extends('layouts.main')

@section('title', $title)

@section('content')

    <h3>Автор: {{ $author->name }}</h3>
    <p> Список книг: </p>
    <ol>
        @foreach($author->books as $book)
            <li>
                {{ $book->name }}
                <a href="{{ route('books.edit', ['book' => $book->id]) }}">Редактировать</a>
                <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Удалить">
                </form>
            </li>
        @endforeach
    </ol>

    <form action="{{ route('book_add', ['authorId' => $author->id]) }}" method="get">
        <button>Добавить книгу</button>
    </form>

@endsection

