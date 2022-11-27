<?php

namespace App\Http\Controllers;

use App\Repositories\AuthorRepository;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function show_all_authors()
    {
        $authors = $this->authorRepository->all();

        return view('author.showAllAuthors', [
            'title' => 'Список авторов',
            'authors' => $authors,
        ]);
    }

    public function create()
    {
        return view('author.create', [
            'title' => 'Создание автора',
        ]);
    }

    public function store(Request $request)
    {
        $this->authorRepository->add($request);

        return redirect()->route('show_all_authors');
    }

    public function show($id)
    {
        $author = $this->authorRepository->showOne($id);

        return view('author.show', [
            'title' => 'Просмотр автора',
            'author' => $author,
        ]);
    }

    public function edit($id)
    {
        $author = $this->authorRepository->showOne($id);

        return view('author.edit', [
            'title' => 'Редактирование автора',
            'author' => $author,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->authorRepository->update($request, $id);

        return redirect()->route('authors.edit', ['author' => $id]);
    }
}
