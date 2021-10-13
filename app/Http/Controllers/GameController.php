<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function manage(Request $request) {
        $titleQuery = $request->input('query');
        $categoryQueries = $request->input('categories');
        $categories = Category::all();

        if (isset($categoryQueries) && $titleQuery != null)
            $games = Game::where('title', 'LIKE', '%' . $titleQuery . '%')->whereIn('category_id', $categoryQueries)->paginate(8);
        else if (isset($categoryQueries))
            $games = Game::whereIn('category_id', $categoryQueries)->paginate(8);
        else if ($titleQuery != null)
            $games = Game::where('title', 'LIKE', '%' . $titleQuery . '%')->paginate(8);
        else
            $games = Game::paginate(8);

        return view('manage.game.index')
            ->with('games', $games)
            ->with('categories', $categories)
            ->with('selectedCategoryIds', $categoryQueries)
            ->with('titleQuery', $titleQuery);
    }

    public function show($id) {
        $game = Game::find($id);
        return view('game.show', ['game' => $game]);
    }
}
