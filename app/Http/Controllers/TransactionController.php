<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Http\Requests\PostTransactionRequest;
use App\Models\Game;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function create() {
        $game_ids_in_cart = CartHelper::get();
        $games = Game::find($game_ids_in_cart);
        if (count($games) == 0) return redirect()->route('cart.index');

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

        $user = User::find(Auth::user()->id);
        $user->level += 1;
        $user->save();

        CartHelper::clear();
        return redirect()->route('transaction.receipt', ['id' => $header->id]);
    }

    public function showReceipt($id) {
        $transaction = TransactionHeader::find($id);

        if ($transaction == null || $transaction->user_id != Auth::user()->id) {
            return redirect()->route('home');
        }

        $game_ids = $transaction->details->map(function ($item, $key) {
           return $item->game_id;
        });
        $games = Game::find($game_ids);

        return view('transaction.receipt')->with('transaction', $transaction)->with('games', $games);
    }

}
