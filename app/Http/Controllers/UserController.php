<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\User;

use Tymon\JWTAuth\Exceptions\UserNotDefinedException;

class UserController extends Controller
{
    public function self()
    {
//        $user = auth()->user()->name;

        $user = $this->authUser();

        return $user;

    }
}
