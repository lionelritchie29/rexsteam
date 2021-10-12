<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $games = Game::inRandomOrder()->limit(8)->get();
        return view('index', ['games' => $games]);
    }
}