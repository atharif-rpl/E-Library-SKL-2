<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Admin Dashboard</title>
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
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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




    <div>
        {{-- Header --}}
        @include('layouts.header')

        <div class="flex min-h-screen">
            {{-- Sidebar --}}
            @include('layouts.sidebar')

            {{-- Main Content Area --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>
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
            const deleteButtons = document.querySelectorAll('button:nth-child(3)');
            const deleteModal = document.getElementById('deleteModal');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    deleteModal.classList.remove('hidden');
                });
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
        });

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





        

       
    </script>
</body>

</html>
