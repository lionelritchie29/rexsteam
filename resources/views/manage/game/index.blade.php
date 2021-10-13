@extends('_layout')

@section('title', 'Manage Game')

@section('content')
    <h1 class="mt-6 text-white text-2xl font-bold mb-3">Manage Games</h1>



        <form class="bg-gray-900 rounded p-6 shadow" method="POST" action="{{ route('manage.game.search') }}">
            @csrf
            <h4 class="text-gray-300 text-sm">Filter by game name</h4>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <!-- Heroicon name: solid/search -->
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input id="search" name="query" value="{{ isset($titleQuery) && $titleQuery != null ? $titleQuery : ''  }}" class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-md leading-5 bg-gray-600 text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 sm:text-sm" placeholder="Search" type="search">
            </div>

            <h4 class="text-gray-300 text-sm mt-3">Filter by game category</h4>
            <div class="grid grid-cols-6">
                @foreach($categories as $category)
                    <div>
                        <input type="checkbox" name="categories[]" {{ isset($selectedCategoryIds) && in_array($category->id, $selectedCategoryIds) ? 'checked' : '' }} value="{{ $category->id }}" class="mr-1">
                        <label class="text-sm text-gray-200">{{ $category->name }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="mt-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Search
            </button>
        </form>

        @if( count($games) == 0 )
            <div class="mt-4">
                <x-warning-alert header="Ups" message="No game available."></x-warning-alert>
            </div>
        @else
            <ul role="list" class="my-6 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach($games as $game)
                    <x-game-card :game="$game" :is-manage="true"></x-game-card>
                @endforeach
            </ul>

            {{ $games->links() }}
        @endif
@endsection
