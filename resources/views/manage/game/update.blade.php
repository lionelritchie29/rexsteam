@extends('_layout')

@section('title', 'Create Game')

@section('content')
    <h1 class="mt-6 text-white text-2xl font-bold">Create Game</h1>

    <div class="bg-gray-800 mt-3 mb-6 p-6 rounded">
        <form action="{{ route('manage.game.update', ['id' => $game->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-8 divide-y divide-gray-600">
            @csrf
            <div class="space-y-8">
                <div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-200">
                                Game Description
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input value="{{ $game->description }}" placeholder="Game Description" type="text" name="game_description" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('game_description') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-200 sm:mt-px">
                                Game Long Description
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-6">
                                <textarea id="about" name="game_long_description" rows="3" class="shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">{{ $game->long_description }}</textarea>
                            </div>
                            @error('game_long_description') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="country" class="block text-sm font-medium text-gray-200">
                                Game Category
                            </label>
                            <div class="mt-1">
                                <select name="category_id" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    @foreach($categories as $category)
                                        <option {{ $category->id == $game->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-200">
                                Game Price
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input value="{{ $game->price }}" placeholder="Game Price" type="number" name="game_price" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('game_price') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div class="sm:gap-4 sm:items-start sm:col-span-6">
                            <label for="cover_photo" class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                                Game Cover
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-6 text-gray-200">
                                <input type="file" name="image_cover">
                                @error('image_cover') <small class="text-red-500">{{ $message }}</small> @enderror
                            </div>

                            <div class="sm:gap-4 sm:items-start sm:col-span-6 text-gray-200">
                                <label for="cover_photo" class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                                    Game Trailer
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-6 text-gray-200">
                                    <input type="file" name="video_trailer">
                                    @error('video_trailer') <small class="text-red-500">{{ $message }}</small> @enderror
                                </div>

                                <div>
                                    <input type="checkbox" {{ $game->contain_adult_content ? 'checked' : '' }} value="true" name="contain_adult_content" class="mr-1">
                                    <label class="text-sm text-gray-200">Only for adult</label>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="mt-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Update Game
                                </button>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
@endsection
