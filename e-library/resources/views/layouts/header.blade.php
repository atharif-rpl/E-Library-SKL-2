 <!-- Minimal Header with Account -->
 <header class="border-b border-gray-100 bg-white">
    <div class="flex items-center justify-between px-4 md:px-6 py-4">
        <div class="flex items-center">
            <button class="md:hidden mr-4 text-gray-400" id="openMobileSidebar">
                <svg class="w-6 h-6" viewBox="0 0 16 16" class="icon-minimal">
                    <path fill="#444" d="M0 1h16v3h-16v-3z"></path>
                    <path fill="#444" d="M0 6h16v3h-16v-3z"></path>
                    <path fill="#444" d="M0 11h16v3h-16v-3z"></path>
                </svg>
            </button>
            <h2 class="text-lg font-medium">E-Library</h2>
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