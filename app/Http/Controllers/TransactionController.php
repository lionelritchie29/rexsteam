<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Http\Requests\PostTransactionRequest;
use App\Models\Game;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function create() {
        $game_ids_in_cart = CartHelper::get();
        $games = Game::find($game_ids_in_cart);

        return view('transaction.create', ['games' => $games]);
    }

    public function store(PostTransactionRequest $request) {
        $request->validated();

        $game_ids_in_cart = CartHelper::get();
        $games = Game::find($game_ids_in_cart);

        $header = TransactionHeader::create([
            'user_id' => Auth::user()->id,
            'card_name' => $request->input('card_name'),
            'card_number' => $request->input('card_number'),
            'card_mm' => $request->input('mm'),
            'card_yy' => $request->input('yy'),
            'cvv' => $request->input('cvv'),
            'zip_code' => $request->input('zipcode'),
            'country' => $request->input('country'),
            'purchased_at' => date('Y-m-d h:i:s'),
        ]);

        foreach ($games as $game) {
            TransactionDetail::create([
                'transaction_id' => $header->id,
                'game_id' => $game->id,
            ]);
        }

        CartHelper::clear();
        return view('cart.index');
    }
}
