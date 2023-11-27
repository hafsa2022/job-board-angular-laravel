<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\IUserService;

class UserController extends Controller
{

    private IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function addUser(Request $request)
    {
        $user = $this->userService->addUser($request);
        return response()->json(['userData'=> $user]);
    }

    public function getUser(Request $request)
    {
        $user = $this->userService->getUser($request);
        return $user;
    }

    public function getAllUsers()
    {
        $users = $this->userService->getAllUsers();
        return response()->json(['users'=> $users]);
    }

    public function updateUserName(Request $request)
    {
        $user = $this->userService->updateUserName($request);
        return response()->json(['user'=> $user]);
    }

}
