@extends('_layout')

@section('title', 'Manage User')

@section('content')
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-5 bg-gray-800 p-5 my-6 rounded">
        <aside class="py-6 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
            <nav class="space-y-1">
                <!-- Current: "bg-gray-50 text-indigo-700 hover:text-indigo-700 hover:bg-white", Default: "text-gray-900 hover:text-gray-900 hover:bg-gray-50" -->
                <a href="{{ route('manage.user.profile') }}" class="{{ request()->route()->getName() == 'manage.user.profile' ? 'bg-gray-50 text-indigo-700' : '' }} text-gray-200 hover:bg-gray-50 hover:text-indigo-700 group rounded-md px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
                    <span class="truncate">
                      Profile
                    </span>
                </a>

                @if (auth()->user()->role->name == \App\Helper\Constant::$MEMBER_ROLE)
                    <a href="{{ route('manage.user.friends') }}" class="{{ request()->route()->getName() == 'manage.user.friends' ? 'bg-gray-50 text-indigo-700' : '' }} text-gray-200 hover:bg-gray-50 hover:text-indigo-700 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                        <span class="truncate">
                          Friends
                        </span>
                    </a>

                    <a href="{{ route('manage.user.transaction-history') }}" class="{{ request()->route()->getName() == 'manage.user.transaction-history' ? 'bg-gray-50 text-indigo-700' : '' }} text-gray-200 hover:bg-gray-50 hover:text-indigo-700 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                        <span class="truncate">
                          Transaction History
                        </span>
                    </a>
                @endif
            </nav>
        </aside>

        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
            @yield('manage-user-content')
        </div>
    </div>
@endsection
