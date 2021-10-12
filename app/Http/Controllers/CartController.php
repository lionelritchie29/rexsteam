<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Helper\Constant;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use MongoDB\Driver\Session;

class CartController extends Controller
{
    private $ONE_DAY_IN_MINUTES = 1440;

    public function index() {
        $games = [];

        if (CartHelper::isCartExist()) {
            $game_ids_in_cart = CartHelper::get();
            $games = Game::find($game_ids_in_cart);
        }

        return view('cart.index', ['games' => $games]);
    }

    public function addToCart(Request $request) {
        $game_id = $request->input('game_id');
        $game_title = $request->input('game_title');

        if (!CartHelper::add($game_id)) {
            return redirect()->back()->with('failed', $game_title . ' is already in the cart!');
        }

        return redirect()->back()->with('success', 'Succesfully added ' . $game_title . ' to the cart!');
    }

    public function confirmDelete(Request $request) {
        $game_id = $request->input('game_id');

        $game = Game::find($game_id);
        return redirect()->back()->with('confirm-delete', $game);
    }

    public function delete(Request $request) {
        $game_id = $request->input('game_id');
        CartHelper::delete($game_id);
        return redirect()->back();
    }
}
