@extends('_layout')

@section('title', 'Cart')

@section('content')
    @if(session('confirm-delete'))
        @php($game_to_be_del = session('confirm-delete'))
        <x-delete-confirmation-modal
            :itemName="$game_to_be_del->title"
            :itemId="$game_to_be_del->id"
            :deleteActionRouteName="'cart.delete'"
            :cancelActionRouteName="'cart.index'"
        />
    @endif

    <h1 class="mt-6 text-white text-2xl font-bold">Your Carts</h1>

    <div class="mt-3 mb-6 shadow overflow-hidden sm:rounded-md">
        <ul class="divide-y divide-gray-600">
            @foreach($games as $game)
                <x-cart-card :game="$game"></x-cart-card>
            @endforeach

                <li>
                    <div class="block bg-gray-800 px-4 py-4 text-gray-300 flex justify-between items-center">
                        <div>Total Price: <span class="font-bold">Rp. {{ $games->sum('price') }}</span></div>
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="button">
                            <x-heroicon-o-truck class="w-4 h-4 mr-1" />
                            Checkout
                        </button>
                    </div>
                </li>
        </ul>
    </div>
@endsection
