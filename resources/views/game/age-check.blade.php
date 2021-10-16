@extends('_layout')

@section('title', $game->title)

@section('content')
    <div class="mx-6 mb-6 mt-24 border-4 border-gray-800 px-32 pb-6 text-gray-400">
        <img class="h-32 mx-auto -mt-12 border-4 border-gray-800" src="{{ asset('storage/' . $game->image_cover_path) }}" alt="{{ $game->title }}">

        <form class="mt-6" method="POST" action="{{ route('game.age-check') }}">
            @csrf
            <h2 class="font-semibold">CONTENT IN THIS PRODUCT MAY BE INAPPROPRIATE FOR ALL AGES, OR MAY NOT BE APPROPRIATE FOR VIEWING AT WORK. </h2>
            <input type="hidden" name="game_id" value="{{ $game->id }}">

            <div class="shadow-lg bg-gray-800 pt-3 pb-6 mt-3">
                <div class="w-3/5 mx-auto text-center">
                    <div class="text-center">Please enter your birth date to continue: </div>
                    <div class="flex">
                        <div class="w-1/4 mr-1">
                            <label class="text-sm">Day</label>
                            <select name="day" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @for($i = 1; $i <= 31; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="w-2/4 mr-1">
                            <label class="text-sm">Month</label>
                            <select name="month" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="1" selected>January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>

                        <div class="w-1/4">
                            <label class="text-sm">Year</label>
                            <select name="year" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @for($i = 1970; $i <= (int)date('Y'); $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    View Page
                </button>
                <a href="{{ route('home') }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-gray-400 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
