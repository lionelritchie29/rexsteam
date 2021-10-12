@extends('_layout')

@section('title', 'Transaction Information')

@section('content')
    <h1 class="mt-6 text-white text-2xl font-bold">Transaction Information</h1>

    <div class="bg-gray-800 mt-3 p-6 rounded">
        <form action="{{ route('transaction.store') }}" method="POST" class="space-y-8 divide-y divide-gray-600">
            @csrf
            <div class="space-y-8">
                <div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="card_name" class="block text-sm font-medium text-gray-200">
                                Card Name
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input placeholder="BCA" type="text" name="card_name" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('card_name') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label for="card_number" class="block text-sm font-medium text-gray-200">
                                Card Number
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input placeholder="0000 0000 0000 0000" type="text" name="card_number" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('card_number') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                    </div>
                </div>

                <div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="expired_date" class="block text-sm font-medium text-gray-200">
                                Expired Date
                            </label>
                            <div class="mt-1">
                                <input type="text" placeholder="MM" name="mm" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            @error('mm') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="" class="block text-sm font-medium text-gray-800">
                                .
                            </label>
                            <div class="mt-1">
                                <input type="text" placeholder="YY" name="yy" autocomplete="family-name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            @error('yy') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="cvv" class="block text-sm font-medium text-gray-200">
                                CVV/CVC
                            </label>
                            <div class="mt-1">
                                <input name="cvv" type="text" placeholder="3 or 4 digits number" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            @error('cvv') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div class="sm:col-span-4">
                            <label for="country" class="block text-sm font-medium text-gray-200">
                                Country / Region
                            </label>
                            <div class="mt-1">
                                <select id="country" name="country" autocomplete="country" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Mexico">Mexico</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="zipcode" class="block text-sm font-medium text-gray-200">
                                ZIP
                            </label>
                            <div class="mt-1">
                                <input type="text" name="zipcode" placeholder="ZIP" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            @error('zipcode') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5 flex justify-between">
                <div class="text-gray-200">
                    Total Price: <span class="font-bold">Rp. {{ $games->sum('price') }}</span>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('cart.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <x-heroicon-o-truck class="w-4 h-4 mr-1" />
                        Checkout
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
