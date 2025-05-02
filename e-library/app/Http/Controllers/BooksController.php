<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{

    
    public function index()
    {
        return view('books.index');
    }

    public function profile()
    {
        return view('books.profile');
    }
    public function editprofile()
    {
        return view('books.editprofile');
    }

    public function create()
    {
        return view ('books.create');
    }

    public function store(Request $request)
    {
       $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:225',
        'publisher' => 'nullable|string|max:225',
        'publication' => 'nullable|integer|min:1800|max:' . date('Y'),
        'isbn' => 'nullable|string|max:225',
        'category' => 'nullable|string|max:100',
        'description' => 'nullable|string',
        'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'pages' => 'nullable|integer|min:1',
        'language' => 'nullable|string|max:100',
        'tags' => 'nullable|string|max:255',
       ]);
       Books::create($request->all());

       return redirect()->route('books.index')
       ->with('success','buku berhasil ditambah.');
    }
    public function show(Books $book)
    {
        return view('books.show', compact('book'));
    }
 
    public function edit(Books $book)
    {
        return view('books.update', compact('book'));
    }

  
    public function update(Request $request, Books $book)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:225',
        'publisher' => 'nullable|string|max:225',
        'publication' => 'nullable|integer|min:1800|max:' . date('Y'),
        'isbn' => 'nullable|string|max:225',
        'category' => 'nullable|string|max:100',
        'description' => 'nullable|string',
        'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'pages' => 'nullable|integer|min:1',
        'language' => 'nullable|string|max:100',
        'tags' => 'nullable|string|max:255',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

  
    public function destroy(Books $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }

}
