<li>
    <div class="block bg-gray-800">
        <div class="flex items-center px-4 py-4 sm:px-6">
            <div class="min-w-0 flex-1 flex items-center">
                <a href="{{ route('game.show', ['id' => $game->id]) }}" class="flex-shrink-0">
                    <img class="w-full h-24 hover:opacity-75" src="{{ asset('storage/' . $game->image_cover_path) }}" alt="{{ $game->title }}">
                </a>
                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                    <div>
                        <div class="flex">
                            <p class="text-sm font-medium text-indigo-400 truncate mr-2">{{ $game->title }}</p>
                            <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-700 text-gray-300">
                                {{ $game->category->name }}
                            </div>
                        </div>
                        <p class="mt-2 flex items-center text-sm text-gray-300">
                            <x-ri-price-tag-3-line class="w-4 h-4 mr-2"/>
                            <span class="truncate">Rp. {{ $game->price }}</span>
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <form action="{{ route('cart.confirm-delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
                        <x-gmdi-delete class="w-4 h-4 mr-1"/>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</li>
