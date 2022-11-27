<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface BookRepositoryInterface
{
    public function allAuthors();

    public function add(Request $request);

    public function getOne($id);

    public function update(Request $request, $id);

    public function delete($id);
}
