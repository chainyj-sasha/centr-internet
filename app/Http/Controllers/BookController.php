<?php

namespace App\Http\Controllers;

use App\Models\Author;
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

    public function create()
    {
        $authors = Author::all();

        return view('book.create', [
            'title' => 'Добавить книгу',
            'authors' => $authors,
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->authorsId);

//TODO продолжить сдесь!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        $book = Book::create([
            'name' => $request->name,
            'year' => $request->year,
        ]);

        $authors = Author::find($request->authorsId);
        $book->author()->attach($authors);

        return redirect()->route('show_all_authors');
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
        $book->author()->detach($book->author);
        $book->delete();

        return redirect()->back();
    }
}
