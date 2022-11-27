<?php

namespace App\Repositories;

use App\Models\Author;
use App\Repositories\Interfaces\AuthorRepositoryInterface;
use Illuminate\Http\Request;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function all()
    {
        return Author::all();
    }

    public function add(Request $request)
    {
        Author::create([
            'name' => $request->name,
        ]);
    }

    public function showOne($id)
    {
        return Author::find($id);
    }

    public function update(Request $request,$id)
    {
        $author = Author::find($id);
        $author->name = $request->name;
        $author->save();
    }
}
