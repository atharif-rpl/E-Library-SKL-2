<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Book - Book Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        .transition-all {
            transition: all 0.2s ease;
        }
        
        .table-row-hover:hover {
            background-color: #f9fafb;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
        
        /* Minimal icon style */
        .icon-minimal {
            stroke-width: 1.5;
            stroke: currentColor;
            fill: none;
        }

        /* Mobile sidebar overlay */
        .mobile-sidebar-overlay {
            background-color: rgba(0, 0, 0, 0.3);
            transition: opacity 0.3s ease;
        }

        /* Mobile sidebar */
        .mobile-sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        
        .mobile-sidebar.open {
            transform: translateX(0);
        }
    </style>
</head>
<body class="bg-white text-gray-800">
    <!-- Mobile Sidebar Overlay (hidden by default) -->
    <div class="mobile-sidebar-overlay fixed inset-0 z-40 hidden opacity-0" id="sidebarOverlay"></div>

    <div class="flex min-h-screen">
        <!-- Sidebar - Desktop version -->
        <div class="hidden md:block w-56 bg-white border-r border-gray-100" id="desktopSidebar">
            <div class="p-6 flex items-center">
                <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" class="icon-minimal">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                    <path d="M8 7h6"></path>
                    <path d="M8 11h8"></path>
                    <path d="M8 15h5"></path>
                </svg>
                <h1 class="text-xl font-medium">Books</h1>
            </div>
            <nav class="mt-2">
                <a href="index.html" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
                    <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                        <rect x="3" y="3" width="7" height="9" rx="1"></rect>
                        <rect x="14" y="3" width="7" height="5" rx="1"></rect>
                        <rect x="14" y="12" width="7" height="9" rx="1"></rect>
                        <rect x="3" y="16" width="7" height="5" rx="1"></rect>
                    </svg>
                    Dashboard
                </a>
                <a href="create.html" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
                    <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>
                    </svg>
                    Add Book
                </a>
                <a href="account.html" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
                    <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Account
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
                    <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1Z"></path>
                    </svg>
                    Settings
                </a>
                <a href="login.html" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
                    <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    Logout
                </a>
            </nav>
        </div>

        <!-- Mobile Sidebar (hidden by default) -->
        <div class="mobile-sidebar fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-100 shadow-lg" id="mobileSidebar">
            <div class="p-6 flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" class="icon-minimal">
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                        <path d="M8 7h6"></path>
                        <path d="M8 11h8"></path>
                        <path d="M8 15h5"></path>
                    </svg>
                    <h1 class="text-xl font-medium">Books</h1>
                </div>
                <button class="text-gray-500 hover:text-gray-700" id="closeMobileSidebar">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" class="icon-minimal">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <nav class="mt-2">
                <a href="index.html" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
                    <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                        <rect x="3" y="3" width="7" height="9" rx="1"></rect>
                        <rect x="14" y="3" width="7" height="5" rx="1"></rect>
                        <rect x="14" y="12" width="7" height="9" rx="1"></rect>
                        <rect x="3" y="16" width="7" height="5" rx="1"></rect>
                    </svg>
                    Dashboard
                </a>
                <a href="create.html" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
                    <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>
                    </svg>
                    Add Book
                </a>
                <a href="account.html" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
                    <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Account
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
                    <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1Z"></path>
                    </svg>
                    Settings
                </a>
                <a href="login.html" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
                    <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    Logout
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Minimal Header with Account -->
            <header class="border-b border-gray-100 bg-white">
                <div class="flex items-center justify-between px-4 md:px-6 py-4">
                    <div class="flex items-center">
                        <button class="md:hidden mr-4 text-gray-400" id="openMobileSidebar">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" class="icon-minimal">
                                <path d="M3 12h18"></path>
                                <path d="M3 6h18"></path>
                                <path d="M3 18h18"></path>
                            </svg>
                        </button>
                        <h2 class="text-lg font-medium">Book Details</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative hidden md:block">
                            <input type="text" placeholder="Search" class="w-48 lg:w-64 px-3 py-1.5 text-sm border-0 bg-gray-50 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                            <svg class="w-4 h-4 absolute right-3 top-2 text-gray-400" viewBox="0 0 24 24" class="icon-minimal">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.3-4.3"></path>
                            </svg>
                        </div>
                        
                        <!-- Account Section -->
                        <div class="relative" id="accountDropdown">
                            <button class="flex items-center focus:outline-none">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar" class="w-8 h-8 rounded-full object-cover">
                                <svg class="w-4 h-4 ml-1 text-gray-400 hidden md:block" viewBox="0 0 24 24" class="icon-minimal">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </button>
                            
                            <!-- Account Dropdown (Hidden by default) -->
                            <div class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-md shadow-sm z-10 fade-in" id="accountMenu">
                                <div class="p-3 border-b border-gray-100">
                                    <p class="text-sm font-medium">John Doe</p>
                                    <p class="text-xs text-gray-500">admin@example.com</p>
                                </div>
                                <div class="py-1">
                                    <a href="account.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                                    <a href="login.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Search Bar -->
                <div class="md:hidden px-4 pb-3">
                    <div class="relative">
                        <input type="text" placeholder="Search" class="w-full px-3 py-1.5 text-sm border-0 bg-gray-50 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                        <svg class="w-4 h-4 absolute right-3 top-2 text-gray-400" viewBox="0 0 24 24" class="icon-minimal">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </div>
                </div>
            </header>

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
    <div class="hidden fixed inset-0 bg-black bg-opacity-20 flex items-center justify-center z-50" id="deleteModal">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile sidebar functionality
            const openMobileSidebar = document.getElementById('openMobileSidebar');
            const closeMobileSidebar = document.getElementById('closeMobileSidebar');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            
            function openSidebar() {
                mobileSidebar.classList.add('open');
                sidebarOverlay.classList.remove('hidden');
                setTimeout(() => {
                    sidebarOverlay.classList.remove('opacity-0');
                }, 50);
                document.body.style.overflow = 'hidden';
            }
            
            function closeSidebar() {
                mobileSidebar.classList.remove('open');
                sidebarOverlay.classList.add('opacity-0');
                setTimeout(() => {
                    sidebarOverlay.classList.add('hidden');
                }, 300);
                document.body.style.overflow = '';
            }
            
            openMobileSidebar.addEventListener('click', openSidebar);
            closeMobileSidebar.addEventListener('click', closeSidebar);
            sidebarOverlay.addEventListener('click', closeSidebar);
            
            // Delete modal functionality
            const deleteButton = document.querySelector('button.bg-red-50');
            const deleteModal = document.getElementById('deleteModal');
            const cancelDelete = document.getElementById('cancelDelete');
            const confirmDelete = document.getElementById('confirmDelete');
            
            deleteButton.addEventListener('click', function() {
                deleteModal.classList.remove('hidden');
            });
            
            cancelDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });
            
            confirmDelete.addEventListener('click', function() {
                // In a real app, this would send a request to delete the book
                deleteModal.classList.add('hidden');
                // Redirect to the books list after deletion
                window.location.href = 'index.html';
            });
            
            // Account dropdown toggle
            const accountDropdown = document.getElementById('accountDropdown');
            const accountMenu = document.getElementById('accountMenu');
            
            accountDropdown.addEventListener('click', function() {
                accountMenu.classList.toggle('hidden');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!accountDropdown.contains(event.target)) {
                    accountMenu.classList.add('hidden');
                }
            });
            
            // Star rating functionality
            const ratingButtons = document.querySelectorAll('form button');
            
            ratingButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    ratingButtons.forEach((btn, i) => {
                        if (i <= index) {
                            btn.classList.add('text-yellow-400');
                            btn.classList.remove('text-gray-300');
                        } else {
                            btn.classList.add('text-gray-300');
                            btn.classList.remove('text-yellow-400');
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
