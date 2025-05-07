{{-- File: resources/views/books/create.blade.php --}}
{{-- Template Blade untuk form tambah buku baru. --}}

{{-- Mengextend layout utama aplikasi, misalnya resources/views/layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Mendefinisikan konten untuk section 'content' --}}
@section('content')

{{-- Container utama untuk konten halaman --}}
<div class="flex-1 flex flex-col">

    {{-- Area konten utama dengan padding dan background --}}
    <main class="flex-1 p-4 md:p-6 bg-white">
        {{-- Container dengan lebar maksimum dan centering untuk form --}}
        <div class="max-w-3xl mx-auto">
            {{-- Form untuk menambah buku baru --}}
            {{-- action: Mengarah ke rute 'books.store' (POST) untuk menyimpan data --}}
            {{-- method: POST untuk mengirim data form --}}
            {{-- enctype="multipart/form-data": WAJIB ditambahkan karena ada input file (cover_image) --}}
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- WAJIB: Token CSRF untuk keamanan form --}}

                {{-- Card atau container untuk bagian informasi buku --}}
                <div class="bg-white rounded-md border border-gray-100 overflow-hidden">
                    <div class="p-6">
                        {{-- Judul bagian form --}}
                        <h3 class="text-lg font-medium mb-6">Book Information</h3>

                        {{-- Field: Book Title --}}
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Book Title</label>
                            {{-- Input text untuk judul buku --}}
                            {{-- name="title": Nama field untuk dikirim ke controller --}}
                            {{-- old('title'): Mempertahankan nilai input jika validasi gagal --}}
                            {{-- required: Menandai field wajib diisi di sisi browser (validasi backend tetap perlu) --}}
                            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter book title" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 @error('title') border-red-500 @enderror" required>
                            {{-- Menampilkan pesan error validasi untuk field 'title' --}}
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Field: Author & Publisher (dalam grid 2 kolom) --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            {{-- Field: Author --}}
                            <div>
                                <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                                {{-- Input text untuk nama penulis --}}
                                <input type="text" id="author" name="author" value="{{ old('author') }}" placeholder="Author name" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 @error('author') border-red-500 @enderror" required>
                                {{-- Menampilkan pesan error validasi untuk field 'author' --}}
                                @error('author')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- Field: Publisher --}}
                            <div>
                                <label for="publisher" class="block text-sm font-medium text-gray-700 mb-1">Publisher</label>
                                {{-- Input text untuk nama penerbit --}}
                                <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}" placeholder="Publisher name" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 @error('publisher') border-red-500 @enderror">
                                {{-- Menampilkan pesan error validasi untuk field 'publisher' --}}
                                @error('publisher')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Field: Publication Year, ISBN, Category (dalam grid 3 kolom) --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            {{-- Field: Publication Year --}}
                            <div>
                                <label for="publication" class="block text-sm font-medium text-gray-700 mb-1">Publication Year</label>
                                {{-- Input number untuk tahun publikasi --}}
                                <input type="number" name="publication" id="publication" value="{{ old('publication') }}" placeholder="YYYY" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 @error('publication') border-red-500 @enderror">
                                {{-- Menampilkan pesan error validasi untuk field 'publication' --}}
                                @error('publication')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- Field: ISBN --}}
                            <div>
                                <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">ISBN</label>
                                {{-- Input text untuk ISBN --}}
                                <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}" placeholder="ISBN number" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 @error('isbn') border-red-500 @enderror">
                                {{-- Menampilkan pesan error validasi untuk field 'isbn' --}}
                                @error('isbn')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- Field: Category --}}
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                {{-- Select dropdown untuk kategori --}}
                                <select id="category" name="category" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 @error('category') border-red-500 @enderror">
                                    <option value="">Select category</option>
                                    {{-- Opsi kategori. Menggunakan old('category') == 'value' untuk mempertahankan pilihan --}}
                                    <option value="fiction" {{ old('category') == 'fiction' ? 'selected' : '' }}>Fiction</option>
                                    <option value="non-fiction" {{ old('category') == 'non-fiction' ? 'selected' : '' }}>Non-Fiction</option>
                                    <option value="science" {{ old('category') == 'science' ? 'selected' : '' }}>Science</option>
                                    <option value="history" {{ old('category') == 'history' ? 'selected' : '' }}>History</option>
                                    <option value="biography" {{ old('category') == 'biography' ? 'selected' : '' }}>Biography</option>
                                    <option value="children" {{ old('category') == 'children' ? 'selected' : '' }}>Children</option>
                                    <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
                                    {{-- Opsi 'Self Improvement' juga masuk ke 'other' di sini, mungkin perlu disesuaikan --}}
                                    <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Self Improvement</option>
                                </select>
                                {{-- Menampilkan pesan error validasi untuk field 'category' --}}
                                @error('category')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Field: Description --}}
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            {{-- Textarea untuk deskripsi buku --}}
                            {{-- old('description'): Mempertahankan nilai textarea jika validasi gagal --}}
                            <textarea id="description" name="description" rows="4" placeholder="Book description" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            {{-- Menampilkan pesan error validasi untuk field 'description' --}}
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Field: Cover Image --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                            <div class="flex items-center gap-4">
                                {{-- Placeholder untuk preview gambar (opsional, butuh JS untuk preview) --}}
                                <div class="w-24 h-32 bg-gray-50 border border-gray-200 rounded-md flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" class="icon-minimal">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    {{-- INPUT FILE SEBENARNYA --}}
                                    {{-- Ini adalah elemen input yang akan mengirim file. --}}
                                    {{-- Atribut 'hidden' menyembunyikannya secara visual. --}}
                                    {{-- ID 'cover_image' dan name='cover_image' sesuai dengan validasi di controller. --}}
                                    <input type="file" id="cover_image" name="cover_image" class="hidden" accept="image/jpg, image/jpeg, image/png">

                                    {{-- Tombol yang akan memicu klik pada input file tersembunyi --}}
                                    {{-- Menggunakan onclick untuk memicu klik pada input file --}}
                                    <button type="button" onclick="document.getElementById('cover_image').click()" class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-md hover:bg-gray-200 transition-all">
                                        Upload Image
                                    </button>
                                    <p class="text-xs text-gray-500 mt-1">JPG, JPEG, or PNG. 2MB max.</p>
                                    {{-- Menampilkan pesan error validasi untuk field 'cover_image' --}}
                                    @error('cover_image')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Card atau container untuk bagian detail tambahan --}}
                    <div class="p-6 border-t border-gray-100">
                        <h3 class="text-lg font-medium mb-6">Additional Details</h3>

                        {{-- Field: Pages & Language (dalam grid 2 kolom) --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            {{-- Field: Number of Pages --}}
                            <div>
                                <label for="pages" class="block text-sm font-medium text-gray-700 mb-1">Number of Pages</label>
                                {{-- Input number untuk jumlah halaman --}}
                                <input type="number" id="pages" name="pages" value="{{ old('pages') }}" placeholder="Number of pages" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 @error('pages') border-red-500 @enderror">
                                {{-- Menampilkan pesan error validasi untuk field 'pages' --}}
                                @error('pages')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- Field: Language --}}
                            <div>
                                <label for="language" class="block text-sm font-medium text-gray-700 mb-1">Language</label>
                                {{-- Select dropdown untuk bahasa --}}
                                <select id="language" name="language" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 @error('language') border-red-500 @enderror">
                                    {{-- Opsi bahasa. Menggunakan old('language') == 'value' untuk mempertahankan pilihan --}}
                                    <option value="english" {{ old('language') == 'english' ? 'selected' : '' }}>English</option>
                                    <option value="spanish" {{ old('language') == 'spanish' ? 'selected' : '' }}>Spanish</option>
                                    <option value="french" {{ old('language') == 'french' ? 'selected' : '' }}>French</option>
                                    <option value="german" {{ old('language') == 'german' ? 'selected' : '' }}>German</option>
                                    <option value="other" {{ old('language') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                {{-- Menampilkan pesan error validasi untuk field 'language' --}}
                                @error('language')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Field: Tags --}}
                        <div class="mb-4">
                            <label for="tags" class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                            {{-- Input text untuk tags --}}
                            <input type="text" id="tags" name="tags" value="{{ old('tags') }}" placeholder="Enter tags separated by commas" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200 @error('tags') border-red-500 @enderror">
                            {{-- Menampilkan pesan error validasi untuk field 'tags' --}}
                            @error('tags')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Bagian tombol aksi (Cancel dan Add Book) --}}
                    <div class="p-6 border-t border-gray-100 flex justify-end">
                        <div class="flex gap-3">
                            {{-- Tombol Cancel (link kembali ke daftar buku) --}}
                            <a href="{{ route('books.index') }}" class="px-4 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-md hover:bg-gray-200 transition-all">
                                Cancel
                            </a>
                            {{-- Tombol Submit Form --}}
                            <button type="submit" class="px-4 py-1.5 bg-black text-white text-sm rounded-md hover:bg-gray-800 transition-all btn btn-primary">
                                Add Book
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

</div> {{-- Akhir dari flex container --}}
@endsection {{-- Akhir dari section 'content' --}}
