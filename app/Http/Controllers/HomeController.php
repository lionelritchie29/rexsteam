<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $games = Game::inRandomOrder()->paginate(8);
        return view('index', ['games' => $games]);
    }

    public function search(Request $request) {
        $query = $request->query('search');

        $games = Game::where('title', 'LIKE', '%' . $query .'%')->paginate(8)->withQueryString();
        return view('search-game', ['games' => $games]);
    }
}
