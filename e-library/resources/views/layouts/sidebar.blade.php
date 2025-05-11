{{-- File: resources/views/layouts/sidebar.blade.php atau file serupa --}}
{{-- Template Blade untuk sidebar desktop dan mobile. --}}

{{-- Overlay yang muncul di belakang sidebar mobile saat terbuka. --}}
{{-- Digunakan untuk menutup sidebar mobile saat diklik di luar area sidebar. --}}
{{-- fixed inset-0 z-40: Memposisikan elemen secara tetap menutupi seluruh layar, dengan z-index 40. --}}
{{-- hidden opacity-0: Menyembunyikan overlay secara default (perlu JavaScript untuk menampilkannya dengan transisi). --}}
<div class="mobile-sidebar-overlay fixed inset-0 z-40 hidden opacity-0 bg-black bg-opacity-50 transition-opacity" id="sidebarOverlay"></div>

{{-- Sidebar Desktop (ditampilkan di layar medium ke atas) --}}
{{-- hidden md:block: Menyembunyikan sidebar secara default, menampilkannya di breakpoint medium ke atas. --}}
{{-- w-56: Lebar tetap 56. --}}
{{-- bg-white border-r border-gray-100: Background putih dengan border kanan tipis. --}}
<div class="hidden md:block w-56 bg-white border-r border-gray-100" id="desktopSidebar">
    {{-- Header sidebar (ikon dan judul aplikasi) --}}
    <div class="p-6 flex items-center">
        {{-- SVG Icon buku --}}
        <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" class="icon-minimal">
            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
            <path d="M8 7h6"></path>
            <path d="M8 11h8"></path>
            <path d="M8 15h5"></path>
        </svg>
        {{-- Judul sidebar --}}
        <h1 class="text-xl font-medium">Books</h1>
    </div>
    {{-- Navigasi sidebar --}}
    <nav class="mt-2">
        {{-- Link Dashboard --}}
        {{-- Menggunakan route('dashboard') sesuai nama rute di web.php --}}
        {{-- class: Styling Tailwind untuk link aktif (bg-gray-50, text-gray-900) --}}
        <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-sm font-medium text-gray-900 bg-gray-50">
            {{-- SVG Icon Dashboard --}}
            <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                <rect x="3" y="3" width="7" height="9" rx="1"></rect>
                <rect x="14" y="3" width="7" height="5" rx="1"></rect>
                <rect x="14" y="12" width="7" height="9" rx="1"></rect>
                <rect x="3" y="16" width="7" height="5" rx="1"></rect>
            </svg>
            Dashboard
        </a>
        {{-- Link Add Book --}}
        {{-- Menggunakan route('books.create') yang sudah benar --}}
        {{-- class: Styling Tailwind untuk link tidak aktif (text-gray-600 hover:...) --}}
        <a href="{{ route('books.create') }}" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
            {{-- SVG Icon tambah --}}
            <svg class="w-4 h-4 mr-3" viewBox="0 0 52 52" class="icon-minimal">
                <path d="M30,29h16.5c0.8,0,1.5-0.7,1.5-1.5v-3c0-0.8-0.7-1.5-1.5-1.5H30c-0.6,0-1-0.4-1-1V5.5C29,4.7,28.3,4,27.5,4
                h-3C23.7,4,23,4.7,23,5.5V22c0,0.6-0.4,1-1,1H5.5C4.7,23,4,23.7,4,24.5v3C4,28.3,4.7,29,5.5,29H22c0.6,0,1,0.4,1,1v16.5
                c0,0.8,0.7,1.5,1.5,1.5h3c0.8,0,1.5-0.7,1.5-1.5V30C29,29.4,29.4,29,30,29z"/>
            </svg>
            Add Book
        </a>

        {{-- Link Settings (Placeholder) --}}
        {{-- href="#" menunjukkan ini belum mengarah ke halaman sebenarnya --}}
        <a href="#" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
            {{-- SVG Icon Settings --}}
            <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1Z"></path>
            </svg>
            Settings
        </a>

        {{-- Link Logout --}}
        {{-- Menggunakan form tersembunyi dan JavaScript untuk request POST --}}
        {{-- Pastikan form #logout-form ada di file layout utama atau di header jika header selalu disertakan --}}
        <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf {{-- WAJIB: Token CSRF --}}
        </form>
        {{-- Link <a> ini memicu submit form di atas saat diklik --}}
        <a href="{{ route('logout') }}"
           class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all"
           onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
            {{-- SVG Icon Logout --}}
            <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
            Logout
        </a>
    </nav>
</div>

  {{-- Sidebar Mobile (hidden by default) --}}
  {{-- fixed inset-y-0 left-0 z-50: Memposisikan sidebar secara tetap di kiri, menutupi tinggi layar, dengan z-index 50. --}}
  {{-- w-64: Lebar 64. --}}
  {{-- bg-white border-r border-gray-100 shadow-lg: Styling background, border, dan shadow. --}}
  {{-- hidden: Menyembunyikan sidebar mobile secara default (perlu JavaScript untuk menampilkannya). --}}
  <div class="mobile-sidebar fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-100 shadow-lg transform -translate-x-full transition-transform ease-in-out duration-300" id="mobileSidebar">
    {{-- Header sidebar mobile (ikon, judul, dan tombol close) --}}
    <div class="p-6 flex items-center justify-between">
        <div class="flex items-center">
            {{-- SVG Icon buku --}}
            <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" class="icon-minimal">
                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                <path d="M8 7h6"></path>
                <path d="M8 11h8"></path>
                <path d="M8 15h5"></path>
            </svg>
            {{-- Judul sidebar --}}
            <h1 class="text-xl font-medium">Books</h1>
        </div>
        {{-- Tombol Close Sidebar Mobile --}}
        {{-- text-gray-500 hover:text-gray-700: Styling warna tombol. --}}
        <button class="text-gray-500 hover:text-gray-700" id="closeMobileSidebar">
            {{-- SVG Icon Close (X) --}}
            <svg class="w-5 h-5" viewBox="0 0 24 24" class="icon-minimal">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    {{-- Navigasi sidebar mobile (sama dengan desktop) --}}
    <nav class="mt-2">
         {{-- Link Dashboard (Mobile) --}}
        {{-- Menggunakan route('dashboard') --}}
        <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-sm font-medium text-gray-900 bg-gray-50">
             {{-- SVG Icon Dashboard --}}
            <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                <rect x="3" y="3" width="7" height="9" rx="1"></rect>
                <rect x="14" y="3" width="7" height="5" rx="1"></rect>
                <rect x="14" y="12" width="7" height="9" rx="1"></rect>
                <rect x="3" y="16" width="7" height="5" rx="1"></rect>
            </svg>
            Dashboard
        </a>
        {{-- Link Add Book (Mobile) --}}
        {{-- Menggunakan route('books.create') --}}
        @if(Auth::user()->isadmin())
        <a href="{{ route('books.create') }}" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
             {{-- SVG Icon tambah --}}
            <svg class="w-4 h-4 mr-3" viewBox="0 0 52 52" class="icon-minimal">
                <path d="M30,29h16.5c0.8,0,1.5-0.7,1.5-1.5v-3c0-0.8-0.7-1.5-1.5-1.5H30c-0.6,0-1-0.4-1-1V5.5C29,4.7,28.3,4,27.5,4
                h-3C23.7,4,23,4.7,23,5.5V22c0,0.6-0.4,1-1,1H5.5C4.7,23,4,23.7,4,24.5v3C4,28.3,4.7,29,5.5,29H22c0.6,0,1,0.4,1,1v16.5
                c0,0.8,0.7,1.5,1.5,1.5h3c0.8,0,1.5-0.7,1.5-1.5V30C29,29.4,29.4,29,30,29z"/>
            </svg>
            Add Book
        </a>
        @endif

        {{-- Link Settings (Placeholder Mobile) --}}
        <a href="#" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all">
             {{-- SVG Icon Settings --}}
            <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1Z"></path>
            </svg>
            Settings
        </a>
        {{-- Link Logout (Mobile) --}}
        {{-- Menggunakan form tersembunyi dan JavaScript untuk request POST --}}
        {{-- Pastikan form #logout-form-sidebar ada --}}
        <a href="{{ route('logout') }}" class="flex items-center px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
            <svg class="w-4 h-4 mr-3" viewBox="0 0 24 24" class="icon-minimal">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
            Logout
        </a>

    </nav>
  </div>

  {{-- Catatan: Untuk membuat sidebar mobile berfungsi (muncul/sembunyi), --}}
  {{-- Anda perlu menambahkan JavaScript. --}}
  {{-- Contoh sederhana menggunakan JavaScript (letakkan di bagian bawah body atau di file JS terpisah): --}}
  {{-- <script> --}}
  {{--     const openMobileSidebarButton = document.getElementById('openMobileSidebar'); // Tombol hamburger di header --}}
  {{--     const closeMobileSidebarButton = document.getElementById('closeMobileSidebar'); // Tombol close di sidebar mobile --}}
  {{--     const mobileSidebar = document.getElementById('mobileSidebar'); --}}
  {{--     const sidebarOverlay = document.getElementById('sidebarOverlay'); --}}

  {{--     if (openMobileSidebarButton && closeMobileSidebarButton && mobileSidebar && sidebarOverlay) { --}}
  {{--         openMobileSidebarButton.addEventListener('click', function() { --}}
  {{--             mobileSidebar.classList.remove('-translate-x-full'); // Tampilkan sidebar --}}
  {{--             sidebarOverlay.classList.remove('hidden', 'opacity-0'); // Tampilkan overlay --}}
  {{--             sidebarOverlay.classList.add('opacity-100'); --}}
  {{--         }); --}}

  {{--         function closeSidebar() { --}}
  {{--             mobileSidebar.classList.add('-translate-x-full'); // Sembunyikan sidebar --}}
  {{--             sidebarOverlay.classList.remove('opacity-100'); // Sembunyikan overlay dengan transisi --}}
  {{--             sidebarOverlay.classList.add('opacity-0'); --}}
  {{--             // Tunggu transisi selesai sebelum menyembunyikan sepenuhnya (opsional) --}}
  {{--             setTimeout(() => { sidebarOverlay.classList.add('hidden'); }, 300); --}}
  {{--         } --}}

  {{--         closeMobileSidebarButton.addEventListener('click', closeSidebar); --}}
  {{--         sidebarOverlay.addEventListener('click', closeSidebar); // Tutup saat klik overlay --}}

  {{--         // Opsional: Tutup sidebar saat link di dalamnya diklik --}}
  {{--         const mobileSidebarLinks = mobileSidebar.querySelectorAll('a'); --}}
  {{--         mobileSidebarLinks.forEach(link => { --}}
  {{--             link.addEventListener('click', closeSidebar); --}}
  {{--         }); --}}
  {{--     } --}}
  {{-- </script> --}}
