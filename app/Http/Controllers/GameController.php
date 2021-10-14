<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostGameRequest;
use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function create() {
        $categories = Category::all();
        return view('manage.game.create', ['categories' => $categories]);
    }

    public function edit($id) {
        $game = Game::find($id);
    }

    public function store(PostGameRequest $request) {
        $request->validated();

        $image_path = $request->file('image_cover')->store('public/images/games');
        $video_path = $request->file('video_trailer')->store('public/video/games');
        $contain_adult_content = $request->has('contain_adult_content');

        Game::create([
            'title' => $request->input('game_title'),
            'description' => $request->input('game_description'),
            'long_description' => $request->input('game_long_description'),
            'category_id' => $request->input('category_id'),
            'developer' => $request->input('game_developer'),
            'publisher' => $request->input('game_publisher'),
            'price' => $request->input('game_price'),
            'image_cover_path' => str_replace('public/', "", $image_path),
            'trailer_video_path' => str_replace('public/', "", $video_path),
            'contain_adult_content' =>$contain_adult_content,
            'release_date' => date('Y-m-d h:i:s')
        ]);

        return redirect()->back()->with('success', 'Create game success');
    }

    public function confirmDelete(Request $request) {
        $game_id = $request->input('game_id');

        $game = Game::find($game_id);
        return redirect()->back()->with('confirm-delete', $game);
    }

    public function delete(Request $request) {
        $game_id = $request->input('game_id');

        $game = Game::find($game_id);
        Storage::delete('public/' . $game->image_cover_path);
        Storage::delete('public/' . $game->trailer_video_path);
        $game->delete();

        return redirect()->back();
    }
}
