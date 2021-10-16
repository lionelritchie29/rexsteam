@extends('manage.user._layout')

@section('manage-user-content')
    <div class="bg-gray-900 py-6 px-4 space-y-6 sm:p-6 text-gray-200">
        <h3 class="text-lg leading-6 font-medium text-gray-200">Transaction History</h3>

        @if (count($transactions) == 0)
            <x-warning-alert header="Ups" message="You have no transactions"></x-warning-alert>
        @else
            @foreach($transactions as $transaction)
                <div class="border-b pb-2 border-gray-800">
                    <h4>Transaction ID: {{ $transaction->id }}</h4>
                    <h4 class="mb-2">Purchased Date: {{ $transaction->purchased_at }}</h4>

                    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-x-4">
                        @foreach($transaction->details as $detail)
                            <a href="{{ route('game.show', ['id' => $detail->game->id]) }}">
                                <img class="w-100 hover:opacity-75" src="{{ asset('storage/' . $detail->game->image_cover_path) }}" alt="{{ $detail->game->title }}">
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-2">
                        Total Price: <span class="font-bold text-lg">Rp. {{ $detail->game->sum('price') }}</span>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
