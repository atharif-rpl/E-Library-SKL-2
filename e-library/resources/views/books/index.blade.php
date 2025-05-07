@extends('layouts.app')

@section('content')
    <div class="mt-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 space-y-3 sm:space-y-0">
            <h4 class="text-base font-medium">Book List</h4>
            <div class="w-full sm:w-auto">
                <select class="w-full sm:w-auto text-xs px-2 py-1 border border-gray-200 rounded-md focus:outline-none">
                    <option>All Categories</option>
                    <option>Fiction</option>
                    <option>Non-Fiction</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto -mx-4 md:mx-0">
            <div class="inline-block min-w-full align-middle px-4 md:px-0">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Buku</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Author</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Publisher</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Tahun Publikasi</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($books as $book)
                            <tr class="table-row-hover">
                                <td class="px-4 py-3">
                                    <div class="text-sm font-medium">{{ $book->title }}</div>
                                </td>
                                <td class="px-4 py-3 text-sm hidden md:table-cell">{{ $book->author }}</td>
                                <td class="px-4 py-3 text-sm hidden lg:table-cell">{{ $book->publisher }}</td>
                                <td class="px-4 py-3 text-sm hidden sm:table-cell">{{ $book->publication }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-3 text-sm">
                                        <a href="{{ route('books.show', $book->id) }}" class="text-gray-400 hover:text-gray-600 transition-all">👁️</a>
                                        <a href="{{ route('books.edit', $book->id) }}" class="text-gray-400 hover:text-gray-600 transition-all">✏️</a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-400 hover:text-red-600 transition-all">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-4">Tidak ada buku.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection