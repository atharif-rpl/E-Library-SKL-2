
@extends('layouts.app')
@section('content')
    

<main class="flex-1 p-4 md:p-6 bg-white">
    <div class="max-w-3xl mx-auto">
        <form>
            <div class="bg-white rounded-md border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-medium mb-6">Personal Information</h3>
                    
                    <div class="mb-6">
                        <div class="flex flex-col md:flex-row items-center gap-4 mb-4">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar" class="w-24 h-24 rounded-full object-cover">
                            <div>
                                <button type="button" class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-md hover:bg-gray-200 transition-all">
                                    Change Photo
                                </button>
                                <p class="text-xs text-gray-500 mt-1">JPG, GIF or PNG. 1MB max.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" id="first_name" name="first_name" value="John" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="Doe" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" id="email" name="email" value="admin@example.com" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                    </div>
                    
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="+1 (555) 123-4567" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                    </div>
                    
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                        <select id="role" name="role" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                            <option value="admin" selected>Administrator</option>
                            <option value="editor">Editor</option>
                            <option value="viewer">Viewer</option>
                        </select>
                    </div>
                </div>
                
                <div class="p-6 border-t border-gray-100">
                    <h3 class="text-lg font-medium mb-6">Change Password</h3>
                    
                    <div class="mb-4">
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                        <input type="password" id="current_password" name="current_password" placeholder="••••••••" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                            <input type="password" id="new_password" name="new_password" placeholder="••••••••" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                        </div>
                        <div>
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                        </div>
                    </div>
                </div>
                
                <div class="p-6 border-t border-gray-100 flex justify-end">
                    <div class="flex gap-3">
                        <a href="{{ route('books.profile') }}" class="px-4 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-md hover:bg-gray-200 transition-all">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-1.5 bg-black text-white text-sm rounded-md hover:bg-gray-800 transition-all">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
