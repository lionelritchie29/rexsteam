@extends('manage.user._layout')

@section('manage-user-content')
    <div class="bg-gray-900 py-6 px-4 space-y-6 sm:p-6 text-gray-200">
        <h3 class="text-lg leading-6 font-medium text-gray-200">Friends</h3>

        <section>
            <h4 class="font-bold">Add Friends</h4>
            <div>
                <form class="mt-1 flex" action="{{ route('manage.user.friends.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="sender_user_id" value="{{ auth()->user()->id }}">
                    <input type="text" name="username" class="text-gray-700 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" placeholder="Username">
                    <button type="submit" class="inline-flex items-center px-3 ml-2 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add
                    </button>
                </form>
                @error('username') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
        </section>

        <section>
            <h4 class="font-bold">Incoming Friend Requests</h4>
            <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                @foreach($incoming_requests as $req)
                    <x-friend-request-card :user="$req->sender" type="incoming"/>
                @endforeach
            </ul>
        </section>

        <section>
            <h4 class="font-bold">Pending Friend Requests</h4>
            <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                @foreach($pending_requests as $req)
                    <x-friend-request-card :user="$req->target" type="pending"/>
                @endforeach
            </ul>
        </section>

        <section>
            <h4 class="font-bold">Friends</h4>
            <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($friends as $friends)
                    <x-friend-request-card
                        :user="$friends->target_user_id == auth()->user()->id ? $friends->sender : $friends->target"
                        type="friend"/>
                @endforeach
            </ul>
        </section>
    </div>
@endsection
