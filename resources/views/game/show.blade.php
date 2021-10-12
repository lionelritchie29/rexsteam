@extends('_layout')

@section('title', $game->title)

@section('content')
    <x-game-detail-breadcrumb :category="$game->category->name" :game-title="$game->title"></x-game-detail-breadcrumb>

    <section class="mt-4 flex">
        <div class="w-2/3 rounded-lg overflow-hidden">
            <video controls autoplay muted>
                <source src="{{ asset('storage/' . $game->trailer_video_path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="w-1/3 ml-3">
            <div class="rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $game->image_cover_path) }}" alt="{{ $game->title }}">
            </div>

            <div class="mt-3 text-gray-200">
                <h2 class="font-bold text-xl">{{ $game->title }}</h2>
                <p class="text-sm mt-1 text-gray-300">{{ $game->description }}</p>
                <div class="mt-2 text-sm">
                    <span class="font-bold">Genre: </span> {{ $game->category->name }}
                </div>
                <div class="mt-1 text-sm">
                    <span class="font-bold">Release Date: </span> {{ $game->release_date }}
                </div>
                <div class="mt-1 text-sm">
                    <span class="font-bold">Developer: </span> {{ $game->developer }}
                </div>
                <div class="mt-1 text-sm">
                    <span class="font-bold">Publisher: </span> {{ $game->publisher }}
                </div>
            </div>
        </div>
    </section>

    <section class="mt-3">
        <div class="bg-gray-900 px-4 py-8 rounded-md relative">
            <span class="text-white font-lg">Buy <span class="font-semibold">{{ $game->title }}</span></span>

            <button class="shadow-lg absolute rounded-sm  -bottom-2 right-3 bg-blue-600 hover:bg-blue-500 cursor-pointer flex text-white px-3 py-1">
                <div>
                    Rp. {{ $game->price }}
                </div>
                <div class="mx-2">
                    |
                </div>
                <div class="flex items-center">
                    <x-grommet-cart class="w-4 h-4 mr-1"/>
                    Add to Cart
                </div>
            </button>
        </div>
    </section>

    <section class="mt-5 mb-6">
        <h3 class="font-2xl text-gray-200 font-semibold">About this game</h3>
        <div class="border-b border-gray-200 mb-2 mt-1"></div>
        <p class="mt-1 font-sm text-gray-300">
            {{ $game->long_description }}
        </p>
    </section>
@endsection
