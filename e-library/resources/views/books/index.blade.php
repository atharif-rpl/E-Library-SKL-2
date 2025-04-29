  @extends('layouts.app')

  @section('content')
      

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
    @endsection