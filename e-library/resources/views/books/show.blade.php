@extends('layouts.app')
@section('content')
<div class="flex-1">
    <main class="flex-1 p-4 md:p-6 bg-white">
        <div class="max-w-3xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
                <div class="flex items-center gap-2 mb-4 md:mb-0">
                    <a href="{{ route('books.index') }}" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" class="icon-minimal">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </a>
                    <h3 class="text-xl font-medium">{{ $book->title }}</h3>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    @if(Auth::user()->isAdmin())
                    <a href="{{ route('books.edit', $book) }}" class="px-4 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-md hover:bg-gray-200 transition-all flex items-center justify-center">
                        <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" class="icon-minimal" stroke="currentColor">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-1.5 bg-red-50 text-red-600 text-sm rounded-md hover:bg-red-100 transition-all flex items-center justify-center w-full sm:w-auto">
                            <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" class="icon-minimal" stroke="currentColor">
                                <path d="M3 6h18"></path>
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                            Hapus
                        </button>
                    </form>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-md border border-gray-100 overflow-hidden">
                <div class="p-6 flex flex-col md:flex-row gap-6">
                    <div class="flex-shrink-0 flex justify-center md:justify-start">
                        <div class="w-32 h-44 bg-gray-50 border border-gray-200 rounded-md overflow-hidden">
                            <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : 'https://via.placeholder.com/128x176' }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-xl font-medium">{{ $book->title }}</h4>
                        <p class="text-gray-500 text-sm">By {{ $book->author }}</p>

                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-y-3 gap-x-6">
                            <div>
                                <p class="text-xs text-gray-500">Publisher</p>
                                <p class="text-sm">{{ $book->publisher ?: 'Tidak tersedia' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Publication Year</p>
                                <p class="text-sm">{{ $book->publication ?: 'Tidak tersedia' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">ISBN</p>
                                <p class="text-sm">{{ $book->isbn ?: 'Tidak tersedia' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Category</p>
                                <p class="text-sm">{{ $book->category ? ucfirst($book->category) : 'Tidak tersedia' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Pages</p>
                                <p class="text-sm">{{ $book->pages ?: 'Tidak tersedia' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Language</p>
                                <p class="text-sm">{{ $book->language ? ucfirst($book->language) : 'Tidak tersedia' }}</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="text-xs text-gray-500">Tags</p>
                            <div class="flex flex-wrap gap-2 mt-1">
                                @if(isset($book->tags))
                                    @foreach(explode(',', $book->tags) as $tag)
                                        <span class="px-2 py-1 bg-gray-50 text-xs rounded-md">{{ trim($tag) }}</span>
                                    @endforeach
                                @else
                                    <span class="text-sm text-gray-500">Tidak ada tag</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-100">
                    <h5 class="text-sm font-medium mb-2">Description</h5>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        {{ $book->description ?: 'Tidak ada deskripsi.' }}
                    </p>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
