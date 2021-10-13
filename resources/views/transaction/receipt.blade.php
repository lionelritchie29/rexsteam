@extends('_layout')

@section('title', 'Transaction Receipt')

@section('content')
    <h1 class="mt-6 text-white text-2xl font-bold">Transaction Receipt</h1>

    @if (count($games) > 0)
        <ul class="divide-y divide-gray-600 mb-6 mt-3 rounded">
            <li>
                <div class="block bg-gray-800 px-4 py-4 text-gray-300">
                    <div>Transaction ID: <span class="font-bold">{{ $transaction->id }}</span></div>
                    <div>Purchase Date: <span class="font-bold">{{ $transaction->purchased_at }}</span></div>
                </div>
            </li>

            @foreach($games as $game)
                <x-cart-card :game="$game" :show-delete-btn="false"></x-cart-card>
            @endforeach

            <li>
                <div class="block bg-gray-800 px-4 py-4 text-gray-300 flex justify-between items-center">
                    <div>Total Price: <span class="font-bold">Rp. {{ $games->sum('price') }}</span></div>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Back to Home
                    </a>
                </div>
            </li>
        </ul>
    @else
        <x-warning-alert header="Ups" message="There is no item in your cart."></x-warning-alert>
    @endif
@endsection
