<li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
    <div class="w-full flex items-center justify-between p-6 space-x-6">
        <div class="flex-1 truncate">
            <div class="flex items-center space-x-3">
                <h3 class="text-gray-900 text-sm font-medium truncate">{{ $user->fullname }}</h3>
                <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">{{ $user->level }}</span>
            </div>
            <p class="mt-1 text-gray-500 text-sm truncate">{{ ucfirst($user->role->name) }}</p>
        </div>
        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{ asset('storage/' . $user->picture_path) }}">
    </div>
    <div>
        <div>
            @if ($type == 'incoming')
                <div class="flex justify-around">
                    <form action="{{ route('manage.user.friends.reject') }}" method="POST">
                        @csrf
                        <input type="hidden" name="sender_user_id" value="{{ $user->id }}">
                        <input type="hidden" name="target_user_id" value="{{ auth()->user()->id }}">
                        <div>
                            <button type="submit" class="flex py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                <x-entypo-cross class="w-5 h-5 mr-1"/>
                                <span class="ml-3">Reject</span>
                            </button>
                        </div>
                    </form>
                    <form action="{{ route('manage.user.friends.accept') }}" method="POST">
                        @csrf
                        <input type="hidden" name="sender_user_id" value="{{ $user->id }}">
                        <input type="hidden" name="target_user_id" value="{{ auth()->user()->id }}">
                        <div>
                            <button type="submit" class="flex py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                <x-heroicon-o-check class="w-5 h-5 mr-1"/>
                                <span class="ml-3">Accept</span>
                            </button>
                        </div>
                    </form>
                </div>
            @elseif ($type == 'pending')
                <div>
                    <form action="{{ route('manage.user.friends.cancel') }}" method="POST">
                        @csrf
                        <input type="hidden" name="sender_user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="target_user_id" value="{{ $user->id }}">
                        <div class="mx-auto">
                            <button type="submit" href="mailto:janecooper@example.com" class="flex mx-auto text-sm py-3 justify-center items-center text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                <x-entypo-cross class="w-5 h-5 mr-1"/>
                                <span class="ml-3">Cancel</span>
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</li>
