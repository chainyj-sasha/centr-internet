<?php

namespace App\Repositories;

use App\Models\Author;
use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Http\Request;

class BookRepository implements BookRepositoryInterface
{
    public function allAuthors()
    {
        return Author::all();
    }

    public function add(Request $request)
    {
        $book = Book::create([
            'name' => $request->name,
            'year' => $request->year,
        ]);

        $authors = Author::find($request->authorsId);
        $book->author()->attach($authors);
    }

    public function getOne($id)
    {
        return Book::find($id);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->name = $request->name;
        $book->year = $request->year;
        $book->save();
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->author()->detach($book->author);
        $book->delete();
    }
}
