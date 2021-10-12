<?php

namespace App\Http\Controllers;

use App\Helper\Constant;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    private $ONE_DAY_IN_MINUTES = 1440;

    public function index() {
        $games = [];

        if (Cookie::get(Constant::$CART_KEY)) {
            $game_ids_in_cart = explode(',', Cookie::get('cart'));
            $games = Game::find($game_ids_in_cart);
        }

        return view('cart.index', ['games' => $games]);
    }

    public function addToCart(Request $request) {
        $game_id = $request->input('game_id');
        $game_title = $request->input('game_title');
        $game_ids_in_cart = null;

        if (Cookie::get(Constant::$CART_KEY)) {
            $game_ids_in_cart = explode(',', Cookie::get('cart'));
//            dd(Cookie::get(Constant::$CART_KEY));
        }

        if ($game_ids_in_cart == null)
            Cookie::queue(Constant::$CART_KEY, $game_id, $this->ONE_DAY_IN_MINUTES);
        else {
            if (in_array($game_id, $game_ids_in_cart)) {
                return redirect()->back()->with('failed', $game_title . ' is already in the cart!');
            }

            array_push($game_ids_in_cart, $game_id);
            Cookie::queue(Constant::$CART_KEY, join(',', $game_ids_in_cart), $this->ONE_DAY_IN_MINUTES);
        }

        return redirect()->back()->with('success', 'Succesfully added ' . $game_title . ' to the cart!');
    }
}
