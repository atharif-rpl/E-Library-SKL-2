@extends('layouts.app')
@section('content')


<main class="flex-1 p-4 md:p-6 bg-white">
    <div class="max-w-3xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
            <h3 class="text-xl font-medium mb-4 md:mb-0">Profile Information</h3>
            <a href="{{ route('books.editprofile') }}" class="px-4 py-1.5 bg-black text-white text-sm rounded-md hover:bg-gray-800 transition-all flex items-center justify-center w-full md:w-auto">
                <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" class="icon-minimal" stroke="currentColor">
                    <path d="M12 20h9"></path>
                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                </svg>
                Edit Profile
            </a>
        </div>

        <div class="bg-white rounded-md border border-gray-100 overflow-hidden">
            <div class="p-6 flex flex-col md:flex-row items-start gap-6">
                <div class="flex-shrink-0">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar" class="w-24 h-24 rounded-full object-cover">
                </div>
                <div class="flex-1">
                    <h4 class="text-lg font-medium">{{ Auth::user()->name }}</h4>
                    <p class="text-gray-500 text-sm">{{ Auth::user()->role }}</p>

                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-500">Email</p>
                            <p class="text-sm">{{ Auth::user()->email }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Phone</p>
                            <p class="text-sm">+1 (555) 123-4567</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Role</p>
                            <p class="text-sm">{{ Auth::user()->role }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Member Since</p>
                            <p class="text-sm">{{ Auth::user()->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h4 class="text-lg font-medium mb-4">Account Activity</h4>

            <div class="bg-white rounded-md border border-gray-100 overflow-hidden">
                <div class="divide-y divide-gray-100">
                    <div class="p-4">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-gray-400" viewBox="0 0 24 24" class="icon-minimal">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                            </svg>
                            <div>
                                <p class="text-sm">You updated your profile information</p>
                                <p class="text-xs text-gray-500 mt-0.5">2 days ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-gray-400" viewBox="0 0 24 24" class="icon-minimal">
                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                                <path d="M8 7h6"></path>
                                <path d="M8 11h8"></path>
                                <path d="M8 15h5"></path>
                            </svg>
                            <div>
                                <p class="text-sm">You added a new book "The Alchemist"</p>
                                <p class="text-xs text-gray-500 mt-0.5">5 days ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-gray-400" viewBox="0 0 24 24" class="icon-minimal">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                            </svg>
                            <div>
                                <p class="text-sm">You edited book "1984"</p>
                                <p class="text-xs text-gray-500 mt-0.5">1 week ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection