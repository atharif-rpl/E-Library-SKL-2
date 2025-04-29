<!-- Mobile Sidebar Overlay (hidden by default) -->
<div class="mobile-sidebar-overlay fixed inset-0 z-40 hidden opacity-0" id="sidebarOverlay"></div>

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
        <a href="{{ route('dashboard.index') }}" class="flex items-center px-6 py-3 text-sm font-medium text-gray-900 bg-gray-50">
            <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                <rect x="3" y="3" width="7" height="9" rx="1"></rect>
                <rect x="14" y="3" width="7" height="5" rx="1"></rect>
                <rect x="14" y="12" width="7" height="9" rx="1"></rect>
                <rect x="3" y="16" width="7" height="5" rx="1"></rect>
            </svg>
            Dashboard
        </a>
        <a href="{{ route('books.create') }}" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
            <svg class="w-4 h-4 mr-3" viewBox="0 0 52 52" class="icon-minimal">
                <path d="M30,29h16.5c0.8,0,1.5-0.7,1.5-1.5v-3c0-0.8-0.7-1.5-1.5-1.5H30c-0.6,0-1-0.4-1-1V5.5C29,4.7,28.3,4,27.5,4
                h-3C23.7,4,23,4.7,23,5.5V22c0,0.6-0.4,1-1,1H5.5C4.7,23,4,23.7,4,24.5v3C4,28.3,4.7,29,5.5,29H22c0.6,0,1,0.4,1,1v16.5
                c0,0.8,0.7,1.5,1.5,1.5h3c0.8,0,1.5-0.7,1.5-1.5V30C29,29.4,29.4,29,30,29z"/>
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
        <a href="{{ route('dashboard.index') }}" class="flex items-center px-6 py-3 text-sm font-medium text-gray-900 bg-gray-50">
            <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                <rect x="3" y="3" width="7" height="9" rx="1"></rect>
                <rect x="14" y="3" width="7" height="5" rx="1"></rect>
                <rect x="14" y="12" width="7" height="9" rx="1"></rect>
                <rect x="3" y="16" width="7" height="5" rx="1"></rect>
            </svg>
            Dashboard
        </a>
        <a href="{{ route('books.create') }}" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
            <svg class="w-4 h-4 mr-3" viewBox="0 0 52 52" class="icon-minimal">
                <path d="M30,29h16.5c0.8,0,1.5-0.7,1.5-1.5v-3c0-0.8-0.7-1.5-1.5-1.5H30c-0.6,0-1-0.4-1-1V5.5C29,4.7,28.3,4,27.5,4
                h-3C23.7,4,23,4.7,23,5.5V22c0,0.6-0.4,1-1,1H5.5C4.7,23,4,23.7,4,24.5v3C4,28.3,4.7,29,5.5,29H22c0.6,0,1,0.4,1,1v16.5
                c0,0.8,0.7,1.5,1.5,1.5h3c0.8,0,1.5-0.7,1.5-1.5V30C29,29.4,29.4,29,30,29z"/>

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

