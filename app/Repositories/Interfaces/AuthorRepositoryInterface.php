<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface AuthorRepositoryInterface
{
    public function all();

    public function add(Request $request);

    public function showOne($id);

    public function update(Request $request, $id);
}
