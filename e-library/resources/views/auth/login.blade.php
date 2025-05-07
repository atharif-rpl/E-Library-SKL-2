{{-- Simpan file ini di: resources/views/auth/login.blade.php --}}
{{-- File ini adalah template Blade untuk halaman login. Blade adalah templating engine Laravel. --}}

<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Mengatur set karakter dokumen --}}
    <meta charset="UTF-8">
    {{-- Mengatur viewport agar responsif di berbagai perangkat --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Judul halaman yang akan muncul di tab browser --}}
    <title>Login - Book Admin Dashboard</title>

    {{-- Menggunakan CDN Tailwind CSS untuk styling. --}}
    {{-- Direkomendasikan menggunakan instalasi lokal Tailwind untuk produksi agar lebih stabil dan bisa dikustomisasi. --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome CDN untuk ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Styling kustom --}}
    <style>
        /* Mengatur font default untuk body */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        /* Kelas untuk transisi halus pada properti CSS */
        .transition-all {
            transition: all 0.2s ease;
        }

        /* Keyframes untuk animasi fade-in */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Kelas untuk menerapkan animasi fade-in */
        .fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }

        /* Minimal style untuk ikon SVG */
        .icon-minimal {
            stroke-width: 1.5; /* Ketebalan garis stroke */
            stroke: currentColor; /* Warna stroke mengikuti warna teks induk */
            fill: none; /* Tidak ada warna isi (fill) */
        }
    </style>
</head>
{{-- Body halaman dengan styling Tailwind untuk layout dan tampilan --}}
<body class="bg-gray-50 text-gray-800 flex items-center justify-center min-h-screen p-4">
    {{-- Container utama untuk form login, dengan lebar maksimum dan centering --}}
    <div class="w-full max-w-md">
        {{-- Bagian header atau judul halaman login --}}
        <div class="text-center mb-8">
            {{-- Container untuk ikon --}}
            <div class="flex justify-center mb-2">
                {{-- SVG Icon Anda --}}
                {{-- Ikon buku sederhana menggunakan SVG --}}
                <svg class="w-8 h-8" viewBox="0 0 24 24" class="icon-minimal">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                    <path d="M8 7h6"></path>
                    <path d="M8 11h8"></path>
                    <path d="M8 15h5"></path>
                </svg>
            </div>
            {{-- Judul utama --}}
            <h1 class="text-2xl font-medium">Welcome back</h1>
            {{-- Sub-judul atau deskripsi --}}
            <p class="text-gray-500 text-sm mt-1">Sign in to your account</p>
        </div>

        {{-- Container untuk form login, dengan background, padding, border, dan shadow --}}
        <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100">

            {{-- Menampilkan Pesan Error Validasi --}}
            {{-- @if ($errors->any()) adalah Blade directive untuk memeriksa apakah ada error validasi --}}
            @if ($errors->any())
                {{-- Styling untuk kotak pesan error --}}
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{-- Menampilkan setiap error dalam bentuk daftar --}}
                    <ul class="list-disc list-inside text-sm">
                        {{-- @foreach adalah Blade directive untuk mengulang array --}}
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li> {{-- Menampilkan teks error --}}
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Menampilkan Pesan Status dari Session (misal setelah logout berhasil) --}}
            {{-- @if (session('status')) memeriksa apakah ada pesan 'status' di session --}}
            @if (session('status'))
                {{-- Styling untuk kotak pesan status --}}
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                    {{ session('status') }} {{-- Menampilkan teks pesan status dari session --}}
                </div>
            @endif

            {{-- Form Login --}}
            {{-- action mengarah ke rute login POST yang bernama 'login' menggunakan helper route() --}}
            {{-- method="POST" menentukan metode HTTP form --}}
            <form action="{{ route('login') }}" method="POST">
                @csrf {{-- WAJIB: Blade directive untuk menghasilkan token CSRF tersembunyi. Penting untuk keamanan. --}}

                {{-- Input field untuk Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    {{-- Input type email --}}
                    {{-- name="email" agar nilai input bisa diakses di controller --}}
                    {{-- value="{{ old('email') }}" menggunakan helper old() untuk mempertahankan input email jika validasi gagal --}}
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200" placeholder="you@example.com" required>
                </div>

                {{-- Input field untuk Password --}}
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        {{-- Link "Forgot password?". Ubah href="#" jika Anda memiliki rute untuk reset password. --}}
                        <a href="#" class="text-xs text-gray-600 hover:text-black">Forgot password?</a>
                    </div>
                    {{-- Input type password --}}
                    {{-- name="password" agar nilai input bisa diakses di controller --}}
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200" placeholder="••••••••" required>
                </div>

                {{-- Checkbox "Remember me" --}}
                <div class="mb-6 flex items-center">
                    {{-- Input type checkbox --}}
                    {{-- name="remember" agar nilai checkbox (on/off) bisa diakses di controller --}}
                    <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-black focus:ring-0 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                </div>

                {{-- Tombol Submit Form --}}
                <button type="submit" class="w-full px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-gray-800 transition-all">
                    Sign In
                </button>
            </form>

            {{-- Bagian untuk link "Sign up" --}}
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">
                    Don't have an account?
                    {{-- Link "Sign up" mengarah ke rute register GET yang bernama 'auth.register' --}}
                    <a href="{{ route('auth.register') }}" class="text-black hover:underline">Sign up</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
