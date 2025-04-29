@extends('layouts.app')
@section('content')
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <div class="mb-8 bg-gray-50 rounded-lg p-6">
        <h2 class="text-2xl font-medium mb-2">Welcome, <span id="userName">John Doe</span>!</h2>
        <p class="text-gray-600">Here's an overview of your book collection and recent activity.</p>
    </div>

    <main class="flex-1 p-4 md:p-6 bg-white">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 md:mb-8 space-y-4 md:space-y-0">
            <h3 class="text-xl font-medium">Book Collection</h3>
            <a href="{{ route('books.create') }}" class="px-4 py-1.5 bg-black text-white text-sm rounded-md hover:bg-gray-800 transition-all flex items-center justify-center md:justify-start w-full md:w-auto">
                <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" class="icon-minimal" stroke="currentColor">
                    <path d="M12 5v14"></path>
                    <path d="M5 12h14"></path>
                </svg>
                Add Book
            </a>
        </div>

        <!-- Stats - Minimalist version with icons -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
            <div class="bg-gray-50 p-4 rounded-md">
                <div class="flex items-center mb-2">
                    <svg class="w-4 h-4 mr-2 text-gray-500" viewBox="0 0 24 24" class="icon-minimal">
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                        <path d="M8 7h6"></path>
                        <path d="M8 11h8"></path>
                        <path d="M8 15h5"></path>
                    </svg>
                    <p class="text-sm text-gray-500">Total Books</p>
                </div>
                <p class="text-2xl font-medium">248</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-md">
                <div class="flex items-center mb-2">
                    <svg class="w-4 h-4 mr-2 text-gray-500" viewBox="0 0 24 24" class="icon-minimal">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <p class="text-sm text-gray-500">Publishers</p>
                </div>
                <p class="text-2xl font-medium">42</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-md">
                <div class="flex items-center mb-2">
                    <svg class="w-4 h-4 mr-2 text-gray-500" viewBox="0 0 24 24" class="icon-minimal">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <p class="text-sm text-gray-500">This Month</p>
                </div>
                <p class="text-2xl font-medium">12 new</p>
            </div>
        </div>

        <!-- Table - Minimalist version -->
        <div class="mt-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 space-y-3 sm:space-y-0">
                <h4 class="text-base font-medium">Book List</h4>
                <div class="w-full sm:w-auto">
                    <select class="w-full sm:w-auto text-xs px-2 py-1 border border-gray-200 rounded-md focus:outline-none">
                        <option>All Categories</option>
                        <option>Fiction</option>
                        <option>Non-Fiction</option>
                    </select>
                </div>
            </div>
            
            <div class="overflow-x-auto -mx-4 md:mx-0">
                <div class="inline-block min-w-full align-middle px-4 md:px-0">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-100">
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Publisher</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Year</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="table-row-hover">
                                <td class="px-4 py-3">
                                    <div class="text-sm font-medium">The Great Gatsby</div>
                                    <div class="text-xs text-gray-500 mt-0.5 md:hidden">Scribner, 1925</div>
                                </td>
                                <td class="px-4 py-3 text-sm hidden md:table-cell">Scribner</td>
                                <td class="px-4 py-3 text-sm hidden sm:table-cell">1925</td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-3 text-sm">
                                        <a href="show-book.html" class="text-gray-400 hover:text-gray-600 transition-all">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" class="icon-minimal">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </a>
                                        <a href="edit-book.html" class="text-gray-400 hover:text-gray-600 transition-all">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" class="icon-minimal">
                                                <path d="M12 20h9"></path>
                                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                                            </svg>
                                        </a>
                                        <button class="text-gray-400 hover:text-red-600 transition-all">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" class="icon-minimal">
                                                <path d="M3 6h18"></path>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-row-hover">
                                <td class="px-4 py-3">
                                    <div class="text-sm font-medium">To Kill a Mockingbird</div>
                                    <div class="text-xs text-gray-500 mt-0.5 md:hidden">J.B. Lippincott & Co., 1960</div>
                                </td>
                                <td class="px-4 py-3 text-sm hidden md:table-cell">J.B. Lippincott & Co.</td>
                                <td class="px-4 py-3 text-sm hidden sm:table-cell">1960</td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-3 text-sm">
                                        <a href="show-book.html" class="text-gray-400 hover:text-gray-600 transition-all">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" class="icon-minimal">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </a>
                                        <a href="edit-book.html" class="text-gray-400 hover:text-gray-600 transition-all">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" class="icon-minimal">
                                                <path d="M12 20h9"></path>
                                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                                            </svg>
                                        </a>
                                        <button class="text-gray-400 hover:text-red-600 transition-all">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" class="icon-minimal">
                                                <path d="M3 6h18"></path>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-row-hover">
                                <td class="px-4 py-3">
                                    <div class="text-sm font-medium">1984</div>
                                    <div class="text-xs text-gray-500 mt-0.5 md:hidden">Secker & Warburg, 1949</div>
                                </td>
                                <td class="px-4 py-3 text-sm hidden md:table-cell">Secker & Warburg</td>
                                <td class="px-4 py-3 text-sm hidden sm:table-cell">1949</td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-3 text-sm">
                                        <a href="show-book.html" class="text-gray-400 hover:text-gray-600 transition-all">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" class="icon-minimal">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </a>
                                        <a href="edit-book.html" class="text-gray-400 hover:text-gray-600 transition-all">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" class="icon-minimal">
                                                <path d="M12 20h9"></path>
                                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                                            </svg>
                                        </a>
                                        <button class="text-gray-400 hover:text-red-600 transition-all">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" class="icon-minimal">
                                                <path d="M3 6h18"></path>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Minimal Pagination -->
            <div class="mt-4 flex flex-col sm:flex-row items-center justify-between space-y-3 sm:space-y-0">
                <div class="text-xs text-gray-500 w-full sm:w-auto text-center sm:text-left">
                    Showing 1 to 3 of 42 results
                </div>
                <div class="flex space-x-1">
                    <button class="px-2 py-1 text-xs text-gray-500 hover:text-gray-800 transition-all">
                        Previous
                    </button>
                    <button class="px-2 py-1 text-xs bg-gray-900 text-white rounded">
                        1
                    </button>
                    <button class="px-2 py-1 text-xs text-gray-500 hover:text-gray-800 transition-all">
                        2
                    </button>
                    <button class="px-2 py-1 text-xs text-gray-500 hover:text-gray-800 transition-all">
                        3
                    </button>
                    <button class="px-2 py-1 text-xs text-gray-500 hover:text-gray-800 transition-all">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>
</div>


<!-- Minimal Delete Modal -->
<div class="hidden fixed inset-0 bg-black bg-opacity-20 flex items-center justify-center z-50" id="deleteModal">
<div class="bg-white rounded-md max-w-md w-full mx-4 p-6 fade-in">
    <h3 class="text-lg font-medium mb-2">Delete Book</h3>
    <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete this book? This action cannot be undone.</p>
    <div class="flex justify-end space-x-3">
        <button class="px-3 py-1.5 text-sm text-gray-600 hover:text-gray-900 transition-all" onclick="document.getElementById('deleteModal').classList.add('hidden')">
            Cancel
        </button>
        <button class="px-3 py-1.5 text-sm bg-black text-white rounded-md hover:bg-gray-800 transition-all">
            Delete
        </button>
    </div>
</div>
</div>


    
</body>
</html>
@endsection