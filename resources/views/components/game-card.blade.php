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
