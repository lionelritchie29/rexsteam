<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - Rex Steam</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-700">
        @if(session('success'))
            <x-banner type="success" message="{{ session('success') }}"></x-banner>
        @elseif(session('failed'))
            <x-banner type="failed" message="{{ session('failed')  }}"></x-banner>
        @endif


        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex-shrink-0 flex items-center">
                            <img class="block lg:hidden h-8 w-auto" src="{{ asset('storage/Heart.png') }}" alt="Workflow">
                            <img class="hidden lg:block h-8 w-auto" src="{{ asset('storage/Heart.png') }}" alt="Workflow">
                        </div>
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('home') }}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>

                                @if(auth()->check() && auth()->user()->role->name == \App\Helper\Constant::$ADMIN_ROLE)
                                    <a href="{{ route('manage.game.index') }}" class="hover:bg-gray-700 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Manage Game</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        @if(!auth()->check())
                        <a href="{{ route('showLogin')  }}" class="text-white hover:bg-gray-700 text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <a href="{{ route('showRegister')  }}" class="text-white hover:bg-gray-700 text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                        @else
                        <!-- Profile dropdown -->
                        <div class="flex">
                            <div class="hidden relative lg:block lg:w-80 mr-4">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <form action="{{ route('search') }}" method="GET">
                                    <input id="search" name="query" class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-md leading-5 bg-gray-700 text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 sm:text-sm" placeholder="Search" type="search">
                                </form>
                            </div>

                            <div class="text-white flex items-center">
                                <a href="{{ route('cart.index') }}">
                                    <x-grommet-cart class="w-6 h-6" />
                                </a>
                            </div>

                            <div class="ml-3 relative">
                                <div class="flex">
                                    <button type="button" id="user-menu-btn" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="{{ asset('storage/' . auth()->user()->picture_path) }}" alt="">
                                    </button>
                                </div>

                                <!--
                                  Dropdown menu, show/hide based on menu state.

                                  Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                  Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                                <div id="user-menu-dropdown" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>

                                    @if(auth()->user()->role->name == \App\Helper\Constant::$MEMBER_ROLE)
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-1">Friends</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-1">Transaction History</a>
                                    @endif

                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="sm:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{ route('home')  }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Home</a>
                </div>
            </div>
        </nav>

        <div class="w-4/5 mx-auto">
            @yield('content')
        </div>

        <script>
            const userMenuBtn = document.getElementById('user-menu-btn');
            const userMenuDropdown = document.getElementById('user-menu-dropdown');

            if (userMenuBtn) {
                userMenuBtn.addEventListener('click', () => {
                    if (userMenuDropdown.classList.contains('hidden'))
                        userMenuDropdown.classList.remove('hidden');
                    else
                        userMenuDropdown.classList.add('hidden');
                });
            }
        </script>

        @stack('script')
    </body>
</html>
