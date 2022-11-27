<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function create()
    {
        $authors = $this->bookRepository->allAuthors();

        return view('book.create', [
            'title' => 'Добавить книгу',
            'authors' => $authors,
        ]);
    }

    public function store(Request $request)
    {
        $this->bookRepository->add($request);

        return redirect()->route('show_all_authors');
    }

    public function edit($id)
    {
        $book = $this->bookRepository->getOne($id);

        return view('book.edit', [
            'title' => 'Редактирование книги',
            'book' => $book,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->bookRepository->update($request, $id);

        return redirect()->route('books.edit', ['book' => $id]);
    }

    public function destroy($id)
    {
        $this->bookRepository->delete($id);

        return redirect()->back();
    }
}
