@extends('layouts.app')
@section('content')


            <!-- Main Content Area -->
            <main class="flex-1 p-4 md:p-6 bg-white">
                <div class="max-w-3xl mx-auto">
                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
                        <div class="flex items-center gap-2 mb-4 md:mb-0">
                            <a href="index.html" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" class="icon-minimal">
                                    <path d="m15 18-6-6 6-6"></path>
                                </svg>
                            </a>
                            <h3 class="text-xl font-medium">1984</h3>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <a href="edit-book.html" class="px-4 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-md hover:bg-gray-200 transition-all flex items-center justify-center">
                                <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" class="icon-minimal" stroke="currentColor">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                                </svg>
                                Edit Book
                            </a>
                            <button type="button" class="px-4 py-1.5 bg-red-50 text-red-600 text-sm rounded-md hover:bg-red-100 transition-all flex items-center justify-center">
                                <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" class="icon-minimal" stroke="currentColor">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                                Delete
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-md border border-gray-100 overflow-hidden">
                        <div class="p-6 flex flex-col md:flex-row gap-6">
                            <div class="flex-shrink-0 flex justify-center md:justify-start">
                                <div class="w-32 h-44 bg-gray-50 border border-gray-200 rounded-md overflow-hidden">
                                    <img src="https://m.media-amazon.com/images/I/71kxa1-0mfL._AC_UF1000,1000_QL80_.jpg" alt="1984 book cover" class="w-full h-full object-cover">
                                </div>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-xl font-medium">1984</h4>
                                <p class="text-gray-500 text-sm">By George Orwell</p>
                                
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-y-3 gap-x-6">
                                    <div>
                                        <p class="text-xs text-gray-500">Publisher</p>
                                        <p class="text-sm">Secker & Warburg</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Publication Year</p>
                                        <p class="text-sm">1949</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">ISBN</p>
                                        <p class="text-sm">978-0451524935</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Category</p>
                                        <p class="text-sm">Fiction</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Pages</p>
                                        <p class="text-sm">328</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Language</p>
                                        <p class="text-sm">English</p>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <p class="text-xs text-gray-500">Tags</p>
                                    <div class="flex flex-wrap gap-2 mt-1">
                                        <span class="px-2 py-1 bg-gray-50 text-xs rounded-md">dystopian</span>
                                        <span class="px-2 py-1 bg-gray-50 text-xs rounded-md">classic</span>
                                        <span class="px-2 py-1 bg-gray-50 text-xs rounded-md">political fiction</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6 border-t border-gray-100">
                            <h5 class="text-sm font-medium mb-2">Description</h5>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Nineteen Eighty-Four is a dystopian novel by George Orwell published in 1949. The novel is set in Airstrip One, a province of the superstate Oceania in a world of perpetual war, omnipresent government surveillance, and public manipulation. The superstate and its residents are dictated to by a political regime euphemistically named English Socialism, shortened to "Ingsoc" in Newspeak, the government's invented language. The superstate is under the control of the privileged Inner Party elite, who persecute individualism and independent thinking as "thoughtcrime".
                            </p>
                        </div>
                    </div>
                    
                    <!-- Reviews Section -->
                    <div class="mt-8">
                        <h4 class="text-base font-medium mb-4">Reviews</h4>
                        
                        <div class="space-y-4">
                            <div class="bg-white rounded-md border border-gray-100 p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Reviewer avatar" class="w-8 h-8 rounded-full object-cover mr-3">
                                        <div>
                                            <p class="text-sm font-medium">Sarah Johnson</p>
                                            <p class="text-xs text-gray-500">June 12, 2023</p>
                                        </div>
                                    </div>
                                    <div class="flex text-yellow-400">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600">
                                    A chilling masterpiece that remains as relevant today as when it was written. Orwell's vision of a totalitarian future is both terrifying and thought-provoking. The way he explores themes of surveillance, propaganda, and the manipulation of truth feels eerily prescient in our digital age.
                                </p>
                            </div>
                            
                            <div class="bg-white rounded-md border border-gray-100 p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Reviewer avatar" class="w-8 h-8 rounded-full object-cover mr-3">
                                        <div>
                                            <p class="text-sm font-medium">Michael Chen</p>
                                            <p class="text-xs text-gray-500">May 3, 2023</p>
                                        </div>
                                    </div>
                                    <div class="flex text-yellow-400">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                        <svg class="w-4 h-4 text-gray-300" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600">
                                    This book has stayed with me long after reading it. The concept of doublethink and the way language is used as a tool of control is brilliantly executed. While some of the technology described feels dated, the psychological insights are timeless.
                                </p>
                            </div>
                        </div>
                        
                        <!-- Add Review Form -->
                        <div class="mt-6">
                            <h5 class="text-sm font-medium mb-3">Add Your Review</h5>
                            <form>
                                <div class="mb-4">
                                    <label class="block text-xs text-gray-500 mb-1">Rating</label>
                                    <div class="flex text-gray-300">
                                        <button type="button" class="w-5 h-5 focus:outline-none">
                                            <svg viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                            </svg>
                                        </button>
                                        <button type="button" class="w-5 h-5 focus:outline-none">
                                            <svg viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                            </svg>
                                        </button>
                                        <button type="button" class="w-5 h-5 focus:outline-none">
                                            <svg viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                            </svg>
                                        </button>
                                        <button type="button" class="w-5 h-5 focus:outline-none">
                                            <svg viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                            </svg>
                                        </button>
                                        <button type="button" class="w-5 h-5 focus:outline-none">
                                            <svg viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-xs text-gray-500 mb-1">Review</label>
                                    <textarea rows="4" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200" placeholder="Write your review here..."></textarea>
                                </div>
                                <button type="submit" class="px-4 py-1.5 bg-black text-white text-sm rounded-md hover:bg-gray-800 transition-all">
                                    Submit Review
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Minimal Delete Modal (Hidden by default) -->
    <div class="hidden fixed inset-0 bg-black bg-opacity-20 flex  items-center justify-center z-50" id="deleteModal">
        <div class="bg-white rounded-md max-w-md w-full mx-4 p-6 fade-in">
            <h3 class="text-lg font-medium mb-2">Delete Book</h3>
            <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete this book? This action cannot be undone.</p>
            <div class="flex justify-end space-x-3">
                <button class="px-3 py-1.5 text-sm text-gray-600 hover:text-gray-900 transition-all" id="cancelDelete">
                    Cancel
                </button>
                <button class="px-3 py-1.5 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition-all" id="confirmDelete">
                    Delete
                </button>
            </div>
        </div>
    </div>

 
</body>
</html>
@endsection