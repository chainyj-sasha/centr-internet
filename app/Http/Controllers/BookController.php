<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show_all_books($authorId)
    {
        $books = Book::where('author_id', $authorId)->get();

        return view('book.showAllBooks', [
           'title' => 'Список книг',
           'books' => $books,
        ]);
    }

    public function add($authorId)
    {
        return view('book.create', [
            'title' => 'Добавить книгу',
            'authorId' => $authorId,
        ]);
    }

    public function store(Request $request)
    {
        Book::create([
            'name' => $request->name,
            'year' => $request->year,
            'author_id' => $request->authorId,
        ]);

        return redirect()->route('authors.show', ['author' => $request->authorId]);
    }

    public function edit($id)
    {
        $book = Book::find($id);

        return view('book.edit', [
            'title' => 'Редактирование книги',
            'book' => $book,
        ]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $book->name = $request->name;
        $book->year = $request->year;
        $book->save();

        return redirect()->route('books.edit', ['book' => $id]);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->back();
    }
}
