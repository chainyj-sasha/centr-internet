<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;

interface UserRepositoryInterface
{
    public function add(UserStoreRequest $request);

    public function login(UserLoginRequest $request);
}
