<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request)
    {
        $user = $this->userRepository->add($request);
        Auth::login($user);

        return redirect()->route('show_all_authors');
    }

    public function login(UserLoginRequest $request)
    {
        $this->userRepository->login($request);

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }
}
