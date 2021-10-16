@extends('manage.user._layout')

@section('manage-user-content')
    <form action="{{ route('manage.user.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-gray-900 py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-200">Profile</h3>
                    <p class="mt-1 text-sm text-gray-400">This information will be displayed publicly so be careful what you share.</p>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-200">
                            Username
                        </label>
                        <div class="mt-1 rounded-md shadow-sm flex">
                            <input disabled type="text" name="username" value="{{ auth()->user()->username }}" class="focus:ring-indigo-500 bg-gray-300 focus:border-indigo-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                        </div>
                    </div>

                    <div class="col-span-3 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-200">
                            Level
                        </label>
                        <div class="mt-1 rounded-md shadow-sm flex">
                            <input disabled type="text" name="level" value="{{ auth()->user()->level }}" class="focus:ring-indigo-500 bg-gray-300 focus:border-indigo-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                        </div>
                    </div>

                    <div class="col-span-3">
                        <label class="block text-sm font-medium text-gray-200">
                            Full Name
                        </label>
                        <div class="mt-1 rounded-md shadow-sm flex">
                            <input type="text" name="full_name" value="{{ auth()->user()->fullname }}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                        </div>
                        @error('full_name') <small class="text-red-500"> {{ $message }}</small> @enderror
                    </div>

                    <div class="col-span-3">
                        <label class="block text-sm font-medium text-gray-200">
                            Photo
                        </label>
                        <div class="mt-1 flex items-center text-white">
                            <span class="inline-block bg-gray-100 rounded-full overflow-hidden h-28 w-28">
                              <img src="{{ asset('storage/' . auth()->user()->picture_path) }}" alt="{{ auth()->user()->fullname }}">
                            </span>
                            <input name="profile_picture" class="ml-2" type="file">
                        </div>
                        @error('profile_picture') <small class="text-red-500"> {{ $message }}</small> @enderror
                    </div>

                    <div class="col-span-3">
                        <label class="block text-sm font-medium text-gray-200">
                            Confirm Password
                        </label>
                        <div class="mt-1 rounded-md shadow-sm flex">
                            <input type="password" name="confirm_password" class="focus:ring-indigo-500 focus:border-indigo-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                        </div>
                        <small class="text-gray-300">Fill this field to check if you are authorized</small>
                        @error('confirm_password') <small class="text-red-500"> {{ $message }}</small> @enderror
                    </div>

                    <div class="col-span-3">
                        <label class="block text-sm font-medium text-gray-200">
                            New Password
                        </label>
                        <div class="mt-1 rounded-md shadow-sm flex">
                            <input type="password" name="new_password" class="focus:ring-indigo-500 focus:border-indigo-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                        </div>
                        <small class="text-gray-300">Only if you want to change your password</small>
                        @error('new_password') <small class="text-red-500"> {{ $message }}</small> @enderror
                    </div>

                    <div class="col-span-3">
                        <label class="block text-sm font-medium text-gray-200">
                            Confirm New Password
                        </label>
                        <div class="mt-1 rounded-md shadow-sm flex">
                            <input type="password" name="confirm_new_password" class="focus:ring-indigo-500 focus:border-indigo-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                        </div>
                        <small class="text-gray-300">Only if you want to change your password</small>
                        @error('confirm_new_password') <small class="text-red-500"> {{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-900 text-right sm:px-6">
                <button type="submit" class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>
    </form>
@endsection
