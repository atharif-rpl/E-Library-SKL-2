{{-- Simpan file ini di: resources/views/auth/register.blade.php --}}
{{-- File ini adalah template Blade untuk halaman registrasi user baru. --}}

<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Mengatur set karakter dokumen --}}
    <meta charset="UTF-8">
    {{-- Mengatur viewport agar responsif di berbagai perangkat --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Judul halaman yang akan muncul di tab browser --}}
    <title>Register - Book Admin Dashboard</title>

    {{-- Menggunakan CDN Tailwind CSS untuk styling. --}}
    {{-- Direkomendasikan menggunakan instalasi lokal Tailwind untuk produksi. --}}
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
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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
    {{-- Container utama untuk form registrasi, dengan lebar maksimum dan centering --}}
    <div class="w-full max-w-md">
        {{-- Bagian header atau judul halaman registrasi --}}
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
            <h1 class="text-2xl font-medium">Create an account</h1>
            {{-- Sub-judul atau deskripsi --}}
            <p class="text-gray-500 text-sm mt-1">Join the book management platform</p>
        </div>

        {{-- Menampilkan Pesan Status dari Session (misal setelah registrasi berhasil) --}}
        {{-- @if (session('status')) memeriksa apakah ada pesan 'status' di session --}}
        @if (session('status'))
            {{-- Styling untuk kotak pesan status --}}
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                {{ session('status') }} {{-- Menampilkan teks pesan status dari session --}}
            </div>
        @endif

        {{-- Menampilkan Pesan Error Validasi --}}
        {{-- @if ($errors->any()) adalah Blade directive untuk memeriksa apakah ada error validasi --}}
        {{-- Bagian ini dipindahkan ke sini agar muncul setelah pesan status jika keduanya ada --}}
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


        {{-- Container untuk form registrasi, dengan background, padding, border, dan shadow --}}
        <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100">
            {{-- Form Registrasi --}}
            {{-- action mengarah ke rute register POST yang bernama 'register' (biasanya ditangani oleh AuthController Laravel) --}}
            {{-- method="POST" menentukan metode HTTP form --}}
            <form action="{{ route('register') }}" method="POST" >
                @csrf {{-- WAJIB: Blade directive untuk menghasilkan token CSRF tersembunyi. Penting untuk keamanan. --}}

                {{-- Input field untuk Nama Lengkap --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    {{-- Input type text --}}
                    {{-- name="name" agar nilai input bisa diakses di controller --}}
                    {{-- Menambahkan old('name') untuk mempertahankan input setelah validasi gagal --}}
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200"
                        placeholder="John Doe" required>
                </div>

                {{-- Input field untuk Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    {{-- Input type email --}}
                    {{-- name="email" agar nilai input bisa diakses di controller --}}
                    {{-- Menambahkan old('email') untuk mempertahankan input setelah validasi gagal --}}
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200"
                        placeholder="you@example.com" required>
                </div>

                {{-- Input field untuk Password --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    {{-- Input type password --}}
                    {{-- name="password" agar nilai input bisa diakses di controller --}}
                    <input type="password" id="password" name="password"
                        class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200"
                        placeholder="••••••••" required>
                </div>

                {{-- Input field untuk Konfirmasi Password --}}
                <div class="mb-4"> {{-- Mengubah mb-6 menjadi mb-4 agar konsisten dengan input di atasnya --}}
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm
                        Password</label>
                    {{-- Input type password --}}
                    {{-- name="password_confirmation" adalah konvensi Laravel untuk konfirmasi password --}}
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200"
                        placeholder="••••••••" required>
                </div>

                 {{-- Input field untuk memilih Role (Dropdown) --}}
                {{-- Perhatikan bahwa ini mungkin perlu disesuaikan tergantung logika bisnis aplikasi Anda. --}}
                {{-- Memberikan opsi role 'user' atau 'admin' saat registrasi mungkin tidak diinginkan dalam banyak kasus. --}}
                {{-- Field: Role (Dropdown) --}}
{{-- Bagian ini memungkinkan user memilih role mereka saat registrasi. --}}
{{-- Perhatikan bahwa ini mungkin perlu disesuaikan tergantung logika bisnis aplikasi Anda. --}}
{{-- Memberikan opsi role 'user' atau 'admin' saat registrasi mungkin tidak diinginkan dalam banyak kasus --}}
{{-- dan mungkin lebih aman jika role admin hanya bisa ditetapkan oleh admin lain setelah registrasi. --}}
<div class="mb-6"> {{-- Mengubah mb-4 menjadi mb-6 agar ada jarak sebelum tombol submit --}}
    {{-- Label untuk dropdown role --}}
    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
    {{-- Elemen <select> untuk dropdown --}}
    {{-- name="role": Nama field yang akan dikirim ke server saat form disubmit. Ini harus cocok dengan nama kolom di database dan properti $fillable di model User. --}}
    {{-- id="role": ID untuk dihubungkan dengan label 'for'. --}}
    {{-- class: Kelas Tailwind CSS untuk styling. --}}
    <select name="role" id="role" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200">
        {{-- Opsi dropdown untuk role 'user' --}}
        {{-- value="user": Nilai yang akan dikirim jika opsi ini dipilih. --}}
        <option value="user">User</option>
        {{-- Opsi dropdown untuk role 'admin' --}}
        {{-- value="admin": Nilai yang akan dikirim jika opsi ini dipilih. --}}
        <option value="admin">Admin</option>
    </select>
    {{-- Anda bisa menambahkan tampilan error validasi di sini jika perlu, seperti yang kita lakukan di form buku: --}}
    {{-- @error('role') --}}
    {{--     <p class="text-red-500 text-xs mt-1">{{ $message }}</p> --}}
    {{-- @enderror --}}
</div>


                {{-- Tombol Submit Form --}}
                <button type="submit"
                    class="w-full px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-gray-800 transition-all">
                    Create Account
                </button>
            </form>

            {{-- Bagian untuk link "Sign in" --}}
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">
                    Already have an account?
                    {{-- Link "Sign in" mengarah ke rute login GET yang bernama 'auth.login' --}}
                    <a href="{{ route('auth.login') }}" class="text-black hover:underline">Sign
                        in</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
