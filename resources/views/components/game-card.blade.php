<div>
    <a href="{{ route('game.show', ['id' => $game->id]) }}" class="relative cursor-pointer">
        <div class="group block w-full aspect-w-10 aspect-h-7 rounded-t-lg bg-gray-100 overflow-hidden">
            <img src="{{ asset('storage/' . $game->image_cover_path) }}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            <button type="button" class="absolute inset-0 focus:outline-none">
                <span class="sr-only">View details for IMG_4985.HEIC</span>
            </button>
        </div>

        <div class="bg-gray-900 px-3 py-3 rounded-b-lg">
            <p class="block text-sm font-medium text-white truncate pointer-events-none font-bold">{{ $game->title }}</p>
            <p class="mt-1 block text-sm font-medium text-white pointer-events-none">
            <span class="flex-shrink-0 inline-block px-2 py-0.5 text-gray-800 text-xs font-medium bg-gray-300 rounded-full">
                {{ $game->category->name }}
            </span>
            </p>
        </div>
    </a>

    @if ($isManage)
    <div class="text-right mr-2 mt-1 flex justify-end">
        <form action="{{ route('manage.game.edit', ['id' => $game->id]) }}" method="GET" class="mr-1">
            @csrf
            <input type="hidden" value="{{ $game->id }}" name="game_id">
            <button class="flex-shrink-0 inline-block px-2 py-0.5 bg-blue-600 hover:bg-blue-500 text-blue-200 text-xs font-medium rounded-full">
                Update
            </button>
        </form>
        <form action="{{ route('manage.game.confirm-delete') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $game->id }}" name="game_id">
            <button class="flex-shrink-0 inline-block px-2 py-0.5 bg-red-600 hover:bg-red-500 text-red-200 text-xs font-medium rounded-full">
                Delete
            </button>
        </form>
    </div>
    @endif

</div>
