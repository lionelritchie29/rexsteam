<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Models\Game;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create() {
        $game_ids_in_cart = CartHelper::get();
        $games = Game::find($game_ids_in_cart);

        return view('transaction.create', ['games' => $games]);
    }
}
