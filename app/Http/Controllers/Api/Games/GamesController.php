<?php

namespace App\Http\Controllers\Api\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Games;

class GamesController extends Controller
{
    public function index()
    {
        $games = Games::all();

        return $games;
    }
}
