@extends('_layout')

@section('title', 'Home')

@section('content')
    <h1 class="mt-6 text-white text-2xl font-bold">Top Games</h1>

    @if( count($games) == 0 )
        <x-warning-alert header="Search not found" message="There are no games content can be showed right now."></x-warning-alert>
    @else
        <ul role="list" class="my-6 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
            @foreach($games as $game)
                <x-game-card :game="$game"></x-game-card>
            @endforeach
        </ul>

        {{ $games->links() }}
    @endif
@endsection
