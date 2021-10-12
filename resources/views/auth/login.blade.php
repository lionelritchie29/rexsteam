@extends('_layout')

@section('title', 'Login')

@section('content')
    <div class="m-5" >
        <div class="min-h-screen rounded-xl bg-gray-800 flex">
            <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                <div class="mx-auto w-full max-w-sm lg:w-96">
                    <div>
                        <h2 class="mt-6 text-3xl font-extrabold text-white">
                            Login to your Account
                        </h2>
                    </div>

                    <div class="mt-8">
                        <div class="mt-6">
                            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                                @csrf
                                <div>
                                    <label for="username" class="block text-sm font-medium text-white">
                                        Username
                                    </label>
                                    <div class="mt-1">
                                        <input name="username" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    @error('username') <small class="text-red-500">{{ $message }}</small> @enderror
                                </div>

                                <div class="space-y-1">
                                    <label for="password" class="block text-sm font-medium text-white">
                                        Password
                                    </label>
                                    <div class="mt-1">
                                        <input id="password" name="password" type="password" autocomplete="current-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    @error('password') <small class="text-red-500">{{ $message }}</small> @enderror
                                </div>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="remember_me" class="ml-2 block text-sm text-white">
                                            Remember me
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-700 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Sign In
                                    </button>
                                </div>

                                <div class="text-right mt-1">
                                    <a href="{{ route('showRegister') }}" class="text-indigo-500 hover:text-indigo-400">Don't have an account?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block relative w-0 flex-1">
                <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('storage/login-bg.jpg')  }}" alt="">
            </div>
        </div>
    </div>
@endsection
