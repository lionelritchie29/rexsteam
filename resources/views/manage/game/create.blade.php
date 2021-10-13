@extends('_layout')

@section('title', 'Create Game')

@section('content')
    <h1 class="mt-6 text-white text-2xl font-bold">Create Game</h1>

    <div class="bg-gray-800 mt-3 mb-6 p-6 rounded">
        <form action="{{ route('transaction.store') }}" method="POST" class="space-y-8 divide-y divide-gray-600">
            @csrf
            <div class="space-y-8">
                <div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="game_name" class="block text-sm font-medium text-gray-200">
                                Game Title
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input placeholder="Game Title" type="text" name="game_name" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('game_name') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-200">
                                Game Description
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input placeholder="Game Description" type="text" name="game_description" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('game_description') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-200 sm:mt-px">
                                Game Long Description
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-6">
                                <textarea id="about" name="about" rows="3" class="shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
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
                                <select name="category" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Mexico">Mexico</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-200">
                                Game Developer
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input placeholder="Game Developer" type="text" name="game_developer" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('game_developer') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-200">
                                Game Publisher
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input placeholder="Game Publisher" type="text" name="game_publisher" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('game_publisher') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-200">
                                Game Price
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input placeholder="Game Price" type="number" name="game_price" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('game_price') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div class="sm:gap-4 sm:items-start sm:col-span-6">
                            <label for="cover_photo" class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                                Game Cover
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-6">
                                <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-200">
                                            <label for="file-upload" class="relative cursor-pointer bg-white px-1 rounded-md font-medium text-gray-200 bg-indigo-600 hover:bg-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-300">
                                            PNG or JPG
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sm:gap-4 sm:items-start sm:col-span-6">
                            <label for="cover_photo" class="block text-sm font-medium text-gray-200 sm:mt-px sm:pt-2">
                                Game Trailer
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-6">
                                <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-200">
                                            <label for="file-upload" class="relative cursor-pointer bg-white px-1 rounded-md font-medium text-gray-200 bg-indigo-600 hover:bg-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-300">
                                            MP4 or WEBM
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <input type="checkbox" name="contain_adult_content" class="mr-1">
                            <label class="text-sm text-gray-200">Only for adult</label>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="mt-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add Game
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
