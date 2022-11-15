<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show_all_authors()
    {
        $authors = Author::all();

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
        Author::create([
            'name' => $request->name,
        ]);

        return redirect()->route('show_all_authors');
    }

    public function show($id)
    {
        $author = Author::find($id);

        return view('author.show', [
            'title' => 'Просмотр автора',
            'author' => $author,
        ]);
    }

    public function edit($id)
    {
        $author = Author::find($id);

        return view('author.edit', [
            'title' => 'Редактирование автора',
            'author' => $author,
        ]);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        $author->name = $request->name;
        $author->save();

        return redirect()->route('authors.edit', ['author' => $id]);
    }
}
