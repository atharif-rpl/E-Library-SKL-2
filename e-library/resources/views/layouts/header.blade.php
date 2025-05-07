 {{-- Bagian ini merepresentasikan header aplikasi Anda. --}}
 <header class="border-b border-gray-100 bg-white">
     {{-- Container utama header dengan flexbox untuk mengatur layout horizontal. --}}
     {{-- items-center: Menyelaraskan item secara vertikal di tengah. --}}
     {{-- justify-between: Mendistribusikan ruang agar item berada di ujung-ujung container. --}}
     {{-- px-4 md:px-6 py-4: Padding horizontal (px) 4 secara default, 6 di breakpoint medium ke atas (md), padding vertikal (py) 4. --}}
     <div class="flex items-center justify-between px-4 md:px-6 py-4">
         {{-- Bagian kiri header (tombol sidebar mobile dan judul). --}}
         <div class="flex items-center">
             {{-- Tombol untuk membuka sidebar di perangkat mobile. --}}
             {{-- md:hidden: Menyembunyikan tombol ini di breakpoint medium ke atas. --}}
             {{-- mr-4: Margin kanan 4. --}}
             {{-- text-gray-400: Warna teks abu-abu 400. --}}
             <button class="md:hidden mr-4 text-gray-400" id="openMobileSidebar">
                 {{-- SVG Icon untuk menu (hamburger). --}}
                 <svg class="w-6 h-6" viewBox="0 0 16 16" class="icon-minimal">
                     <path fill="#444" d="M0 1h16v3h-16v-3z"></path>
                     <path fill="#444" d="M0 6h16v3h-16v-3z"></path>
                     <path fill="#444" d="M0 11h16v3h-16v-3z"></path>
                 </svg>
             </button>
             {{-- Judul aplikasi. --}}
             <h2 class="text-lg font-medium">E-Library</h2>
         </div>
         {{-- Bagian kanan header (search bar dan account section). --}}
         {{-- space-x-4: Menambahkan ruang horizontal antara item flex sebesar 4. --}}
         <div class="flex items-center space-x-4">
             {{-- Search Bar (Desktop) --}}
             {{-- relative: Diperlukan agar ikon pencarian bisa diposisikan absolut di dalamnya. --}}
             {{-- hidden md:block: Menyembunyikan search bar secara default, menampilkannya di breakpoint medium ke atas. --}}
             <div class="relative hidden md:block">
                 {{-- Input field untuk pencarian. --}}
                 {{-- w-48 lg:w-64: Lebar 48 secara default, 64 di breakpoint large ke atas. --}}
                 {{-- px-3 py-1.5: Padding horizontal 3, padding vertikal 1.5. --}}
                 {{-- text-sm: Ukuran teks kecil. --}}
                 {{-- border-0: Menghilangkan border default. --}}
                 {{-- bg-gray-50: Background abu-abu sangat terang. --}}
                 {{-- rounded-md: Border radius medium. --}}
                 {{-- focus:outline-none focus:ring-1 focus:ring-gray-200: Styling saat input difokuskan (menghilangkan outline, menambahkan ring). --}}
                 <input type="text" placeholder="Search"
                     class="w-48 lg:w-64 px-3 py-1.5 text-sm border-0 bg-gray-50 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
                 {{-- SVG Icon untuk pencarian, diposisikan absolut. --}}
                 {{-- absolute right-3 top-2: Diposisikan 3 dari kanan dan 2 dari atas relatif terhadap parent div. --}}
                 {{-- text-gray-400: Warna ikon abu-abu 400. --}}
                 <svg class="w-4 h-4 absolute right-3 top-2 text-gray-400" viewBox="0 0 24 24" class="icon-minimal">
                     <circle cx="11" cy="11" r="8"></circle>
                     <path d="m21 21-4.3-4.3"></path>
                 </svg>
             </div>

             {{-- Bagian akun dengan dropdown. --}}
             {{-- relative: Diperlukan agar dropdown menu bisa diposisikan absolut di dalamnya. --}}
             {{-- id="accountDropdown": ID untuk referensi JavaScript (misal untuk toggle dropdown). --}}
             <div class="relative" id="accountDropdown">
                 {{-- Tombol yang memicu dropdown akun. --}}
                 {{-- flex items-center: Mengatur layout horizontal untuk avatar dan panah. --}}
                 {{-- focus:outline-none: Menghilangkan outline saat tombol difokuskan. --}}
                 <button class="flex items-center focus:outline-none">
                     {{-- Avatar user. --}}
                     {{-- w-8 h-8: Lebar dan tinggi 8. --}}
                     {{-- rounded-full: Membuat gambar bulat. --}}
                     {{-- object-cover: Memastikan gambar menutupi area tanpa terdistorsi. --}}
                     <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar"
                         class="w-8 h-8 rounded-full object-cover">
                     {{-- SVG Icon panah bawah (hanya ditampilkan di desktop). --}}
                     {{-- w-4 h-4: Lebar dan tinggi 4. --}}
                     {{-- ml-1: Margin kiri 1. --}}
                     {{-- text-gray-400: Warna abu-abu 400. --}}
                     {{-- hidden md:block: Menyembunyikan di mobile, menampilkan di desktop. --}}
                     <svg class="w-4 h-4 ml-1 text-gray-400 hidden md:block" viewBox="0 0 24 24" class="icon-minimal">
                         <path d="m6 9 6 6 6-6"></path>
                     </svg>
                 </button>

                 {{-- Konten dropdown akun. --}}
                 {{-- hidden: Menyembunyikan dropdown secara default. Perlu JavaScript untuk menampilkannya. --}}
                 {{-- absolute right-0 mt-2: Diposisikan absolut di kanan (right-0) dan margin atas 2 (mt-2). --}}
                 {{-- w-48: Lebar 48. --}}
                 {{-- bg-white: Background putih. --}}
                 {{-- border border-gray-100: Border tipis abu-abu terang. --}}
                 {{-- rounded-md: Border radius medium. --}}
                 {{-- shadow-sm: Shadow kecil. --}}
                 {{-- z-10: Menempatkan elemen di atas elemen lain. --}}
                 {{-- fade-in: Kelas untuk animasi fade-in (definisi di <style>). --}}
                 {{-- Bagian ini adalah konten dropdown menu akun di header. --}}
                 {{-- File: resources/views/layouts/header.blade.php --}}

                 {{-- Pastikan div ini memiliki ID yang sama ('accountMenu') dan kelas 'hidden' --}}
                 <div class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-md shadow-sm z-10 fade-in"
                     id="accountMenu">
                     {{-- Memeriksa apakah ada user yang sedang login --}}
                     @auth
                         {{-- Bagian informasi user yang sedang login --}}
                         <div class="p-3 border-b border-gray-100">
                             {{-- Menampilkan Nama user yang sedang login --}}
                             {{-- Menggunakan Auth::user() untuk mendapatkan instance user yang login --}}
                             <p class="text-sm font-medium"> {{ Auth::user()->name }}</p>
                             {{-- Menampilkan Email user yang sedang login --}}
                             <p class="text-xs text-gray-500"> {{ Auth::user()->email }}</p>
                             {{-- Menampilkan Role user yang sedang login --}}
                             {{-- Mengakses properti 'role' dari instance user yang login --}}
                             <p class="text-xs text-gray-500 capitalize">{{ Auth::user()->role }}</p> {{-- Menambahkan 'capitalize' untuk membuat huruf pertama kapital --}}
                         </div>
                     @endauth

                     {{-- Bagian link-link di dropdown --}}
                     <div class="py-1">
                         {{-- Link Profil --}}
                         <a href="{{ route('books.profile') }}"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>

                         {{-- Link Settings (placeholder) --}}
                         <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>

                         {{-- Link Logout - Menggunakan form untuk request POST --}}
                         {{-- Pastikan form ini ada di file layout utama (misal: app.blade.php) atau di header jika header selalu disertakan --}}
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf {{-- WAJIB: Token CSRF untuk keamanan --}}
                         </form>
                         {{-- Link <a> ini akan memicu submit form di atas menggunakan JavaScript --}}
                         <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                             Logout
                         </a>
                     </div>
                 </div>

                 {{-- Catatan: Untuk membuat dropdown akun berfungsi (muncul/sembunyi saat tombol diklik), --}}
                 {{-- Anda perlu menambahkan sedikit JavaScript. --}}
                 {{-- Contoh sederhana menggunakan JavaScript (letakkan di bagian bawah body atau di file JS terpisah): --}}
                 {{-- <script> --}}
                 {{--     const accountDropdown = document.getElementById('accountDropdown'); // ID dari tombol trigger dropdown --}}
                 {{--     const accountMenu = document.getElementById('accountMenu'); // ID dari konten dropdown --}}

                 {{--     if (accountDropdown && accountMenu) { --}}
                 {{--         accountDropdown.addEventListener('click', function() { --}}
                 {{--             accountMenu.classList.toggle('hidden'); // Menambah/menghapus class 'hidden' --}}
                 {{--         }); --}}

                 {{--         // Opsional: Sembunyikan dropdown saat mengklik di luar area dropdown --}}
                 {{--         document.addEventListener('click', function(event) { --}}
                 {{--             if (!accountDropdown.contains(event.target) && !accountMenu.contains(event.target)) { --}}
                 {{--                 accountMenu.classList.add('hidden'); --}}
                 {{--             } --}}
                 {{--         }); --}}
                 {{--     } --}}
                 {{-- </script> --}}

             </div>
         </div>
     </div>
     {{-- Search Bar (Mobile) --}}
     {{-- md:hidden: Menyembunyikan search bar ini di breakpoint medium ke atas. --}}
     {{-- px-4 pb-3: Padding horizontal 4, padding bawah 3. --}}
     <div class="md:hidden px-4 pb-3">
         {{-- relative: Diperlukan agar ikon pencarian bisa diposisikan absolut di dalamnya. --}}
         <div class="relative">
             {{-- Input field pencarian untuk mobile. --}}
             {{-- w-full: Lebar penuh dari parent container. --}}
             {{-- px-3 py-1.5: Padding horizontal 3, padding vertikal 1.5. --}}
             {{-- text-sm: Ukuran teks kecil. --}}
             {{-- border-0: Menghilangkan border default. --}}
             {{-- bg-gray-50: Background abu-abu sangat terang. --}}
             {{-- rounded-md: Border radius medium. --}}
             {{-- focus:outline-none focus:ring-1 focus:ring-gray-200: Styling saat input difokuskan. --}}
             <input type="text" placeholder="Search"
                 class="w-full px-3 py-1.5 text-sm border-0 bg-gray-50 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
             {{-- SVG Icon pencarian, diposisikan absolut. --}}
             {{-- w-4 h-4: Lebar dan tinggi 4. --}}
             {{-- absolute right-3 top-2: Diposisikan 3 dari kanan dan 2 dari atas relatif terhadap parent div. --}}
             {{-- text-gray-400: Warna ikon abu-abu 400. --}}
             <svg class="w-4 h-4 absolute right-3 top-2 text-gray-400" viewBox="0 0 24 24" class="icon-minimal">
                 <circle cx="11" cy="11" r="8"></circle>
                 <path d="m21 21-4.3-4.3"></path>
             </svg>
         </div>
     </div>
 </header>

 {{-- Catatan: Untuk membuat dropdown akun berfungsi (muncul/sembunyi saat tombol diklik), --}}
 {{-- Anda perlu menambahkan sedikit JavaScript. --}}
 {{-- Contoh sederhana menggunakan JavaScript: --}}
 {{-- <script> --}}
 {{--     const accountDropdown = document.getElementById('accountDropdown'); --}}
 {{--     const accountMenu = document.getElementById('accountMenu'); --}}

 {{--     accountDropdown.addEventListener('click', function() { --}}
 {{--         accountMenu.classList.toggle('hidden'); // Menambah/menghapus class 'hidden' --}}
 {{--     }); --}}

 {{--     // Opsional: Sembunyikan dropdown saat mengklik di luar area dropdown --}}
 {{--     document.addEventListener('click', function(event) { --}}
 {{--         if (!accountDropdown.contains(event.target) && !accountMenu.contains(event.target)) { --}}
 {{--             accountMenu.classList.add('hidden'); --}}
 {{--         } --}}
 {{--     }); --}}
 {{-- </script> --}}
