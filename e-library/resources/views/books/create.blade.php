@extends('layouts.app')
@section('content')
<div class="flex-1 flex flex-col">


    <!-- Main Content Area -->
    <main class="flex-1 p-4 md:p-6 bg-white">
        <div class="max-w-3xl mx-auto">
            <form>
                <div class="bg-white rounded-md border border-gray-100 overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-lg font-medium mb-6">Book Information</h3>
                        
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Book Title</label>
                            <input type="text" id="title" name="title" placeholder="Enter book title" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200" required>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                                <input type="text" id="author" name="author" placeholder="Author name" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200" required>
                            </div>
                            <div>
                                <label for="publisher" class="block text-sm font-medium text-gray-700 mb-1">Publisher</label>
                                <input type="text" id="publisher" name="publisher" placeholder="Publisher name" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Publication Year</label>
                                <input type="number" id="year" name="year" placeholder="YYYY" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                            </div>
                            <div>
                                <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">ISBN</label>
                                <input type="text" id="isbn" name="isbn" placeholder="ISBN number" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                            </div>
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                <select id="category" name="category" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                                    <option value="">Select category</option>
                                    <option value="fiction">Fiction</option>
                                    <option value="non-fiction">Non-Fiction</option>
                                    <option value="science">Science</option>
                                    <option value="history">History</option>
                                    <option value="biography">Biography</option>
                                    <option value="children">Children</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea id="description" name="description" rows="4" placeholder="Book description" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200"></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                            <div class="flex items-center gap-4">
                                <div class="w-24 h-32 bg-gray-50 border border-gray-200 rounded-md flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" class="icon-minimal">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <button type="button" class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-md hover:bg-gray-200 transition-all">
                                        Upload Image
                                    </button>
                                    <p class="text-xs text-gray-500 mt-1">JPG, GIF or PNG. 2MB max.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 border-t border-gray-100">
                        <h3 class="text-lg font-medium mb-6">Additional Details</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="pages" class="block text-sm font-medium text-gray-700 mb-1">Number of Pages</label>
                                <input type="number" id="pages" name="pages" placeholder="Number of pages" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                            </div>
                            <div>
                                <label for="language" class="block text-sm font-medium text-gray-700 mb-1">Language</label>
                                <select id="language" name="language" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                                    <option value="english">English</option>
                                    <option value="spanish">Spanish</option>
                                    <option value="french">French</option>
                                    <option value="german">German</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="tags" class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                            <input type="text" id="tags" name="tags" placeholder="Enter tags separated by commas" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                        </div>
                    </div>
                    
                    <div class="p-6 border-t border-gray-100 flex justify-end">
                        <div class="flex gap-3">
                            <a href="index.html" class="px-4 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-md hover:bg-gray-200 transition-all">
                                Cancel
                            </a>
                            <button type="submit" class="px-4 py-1.5 bg-black text-white text-sm rounded-md hover:bg-gray-800 transition-all">
                                Add Book
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    
@endsection