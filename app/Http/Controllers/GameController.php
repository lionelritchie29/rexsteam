<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostGameRequest;
use App\Http\Requests\PutGameRequest;
use App\Models\Category;
use App\Models\Game;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if (Auth::check()) {
            $alreadyOwned = $this->checkAlreadyOwned(Auth::user()->id, $game->id);
        }

        if ($game->contain_adult_content) {
            return view('game.age-check', ['game' => $game]);
        } else {
            return view('game.show')->with('game', $game)->with('alreadyOwned', $alreadyOwned);
        }
    }

    public function showWithoutCheck($id) {
        $game = Game::find($id);
        if (Auth::check()) {
            $alreadyOwned = $this->checkAlreadyOwned(Auth::user()->id, $game->id);
        }
        return view('game.show')->with('game', $game)->with('alreadyOwned', $alreadyOwned);
    }

    public function ageCheck(Request $request) {
        $date_string = $request->input('day') . '-' . $request->input('month') . '-' . $request->input('year');
        $birth_date = date_create($date_string);
        $current_date = date_create(date('d-m-Y'));
        $age = date_diff($birth_date, $current_date);
        $age_in_year = (int) $age->format('%y');

        if ($age_in_year < 17) {
            return redirect()->route('home')->with('failed', 'You are not allowed to see the game detail because it contain inappropriate contents!');
        } else {
            $game = Game::find($request->input('game_id'));
            if (Auth::check()) {
                $alreadyOwned = $this->checkAlreadyOwned(Auth::user()->id, $game->id);
            }
            return view('game.show')->with('game', $game)->with('alreadyOwned', $alreadyOwned);
        }
    }

    private function checkAlreadyOwned($user_id, $game_id) {
        $headers = TransactionHeader::where('user_id', $user_id)->get();

        if (count($headers) > 0) {
            foreach ($headers as $header) {
                $detail = $header->details->filter(function ($value, $key) use ($game_id) {
                    return $value->game_id == $game_id;
                });

                if (count($detail) > 0) {
                    return true;
                }
            }
        }

        return false;
    }

    public function create() {
        $categories = Category::all();
        return view('manage.game.create', ['categories' => $categories]);
    }

    public function edit($id) {
        $game = Game::find($id);
        $categories = Category::all();
        if ($game == null) return redirect()->route('home');

        return view('manage.game.update')->with('categories', $categories)->with('game', $game);
    }

    public function update($id, PutGameRequest $request) {
        $game = Game::find($id);
        $game->description = $request->input('game_description');
        $game->long_description = $request->input('game_long_description');
        $game->category_id = $request->input('category_id');
        $game->price = $request->input('game_price');

        if ($request->has('contain_adult_content')) {
            $game->contain_adult_content = $request->has('contain_adult_content');
        }

        if ($request->has('image_cover')) {
            $image_path = $request->file('image_cover')->store('public/images/games');
            Storage::delete('public/' . $game->image_cover_path);
            $game->image_cover_path = str_replace('public/', "", $image_path);
        }

        if ($request->has('video_trailer')) {
            $video_path = $request->file('video_trailer')->store('public/video/games');
            Storage::delete('public/' . $game->trailer_video_path);
            $game->trailer_video_path = str_replace('public/', "", $video_path);
        }

        $game->save();

        return redirect()->route('manage.game.index')->with('success', 'Game updated successfully!');
    }

    public function store(PostGameRequest $request) {
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

        return redirect()->route('manage.game.index')->with('success', 'Create game success');
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
