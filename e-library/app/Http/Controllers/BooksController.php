<?php

namespace App\Http\Controllers; // Mendefinisikan namespace untuk controller ini.

use Illuminate\Support\Facades\Validator; // Mengimpor Facade Validator (meskipun validate() di Request digunakan di sini, Validator bisa digunakan untuk validasi manual).
use Illuminate\Http\Request; // Mengimpor class Request, merepresentasikan request HTTP yang masuk.
use App\Models\Book; // Mengimpor model Book untuk berinteraksi dengan tabel 'books'.
use Illuminate\Support\Facades\Storage; // Mengimpor Facade Storage jika Anda berencana menyimpan file (misal: cover_image).
use Illuminate\View\View; // Mengimpor View untuk type hinting
use Illuminate\Http\RedirectResponse; // Mengimpor RedirectResponse untuk type hinting


/**
 * Kelas BooksController bertanggung jawab untuk menangani request terkait manajemen buku.
 * Controller ini menyediakan metode untuk menampilkan daftar buku, menampilkan detail buku,
 * menambah buku baru, mengedit buku, dan menghapus buku.
 */
class BooksController extends Controller
{

    /**
     * Menampilkan daftar semua buku.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Mengambil semua data buku dari tabel 'books' menggunakan model Book.
        $books = Book::all();
        // Mengembalikan view 'books.index' dan menyertakan data buku.
        // compact('books') adalah cara singkat untuk ['books' => $books].
        return view('books.index', compact('books'));
    }

    // Metode profile() dan editprofile() telah dipindahkan ke AuthController.

    /**
     * Menampilkan form untuk menambah buku baru.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // Mengembalikan view 'books.create' yang berisi form tambah buku.
        return view ('books.create');
    }

    /**
     * Menyimpan data buku baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request Objek request yang berisi data dari form.
     * @return \Illuminate\Http\RedirectResponse Mengarahkan kembali ke halaman daftar buku.
     */
    public function store(Request $request): RedirectResponse
    {
       // Melakukan validasi data yang diterima dari request.
       // Jika validasi gagal, Laravel akan otomatis mengarahkan kembali
       // ke halaman sebelumnya dengan error validasi.
       $request->validate([
            'title' => 'required|string|max:255', // Judul wajib diisi, berupa string, maks 255 karakter.
            'author' => 'required|string|max:225', // Penulis wajib diisi, berupa string, maks 225 karakter.
            'publisher' => 'nullable|string|max:225', // Penerbit opsional, berupa string, maks 225 karakter.
            'publication' => 'nullable|integer|min:1800|max:' . date('Y'), // Tahun publikasi opsional, integer, min 1800, maks tahun saat ini.
            'isbn' => 'nullable|string|max:225', // ISBN opsional, berupa string, maks 225 karakter.
            'category' => 'nullable|string|max:100', // Kategori opsional, berupa string, maks 100 karakter.
            'description' => 'nullable|string', // Deskripsi opsional, berupa string.
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Cover image opsional, harus file gambar, format jpg/jpeg/png, maks 2048 KB (2MB).
            'pages' => 'nullable|integer|min:1', // Jumlah halaman opsional, integer, min 1.
            'language' => 'nullable|string|max:100', // Bahasa opsional, berupa string, maks 100 karakter.
            'tags' => 'nullable|string|max:255', // Tags opsional, berupa string, maks 255 karakter.
       ]);

       // Membuat record buku baru di database menggunakan data dari request.
       // $request->all() mengembalikan array semua input dari request.
       // Ini aman karena model Book memiliki $fillable yang mendefinisikan kolom yang diizinkan.
       Book::create($request->all());

       // Mengarahkan kembali user ke halaman daftar buku setelah berhasil menyimpan.
       // ->with('success', ...) menambahkan pesan 'success' ke flash session,
       // yang bisa ditampilkan di view pada request berikutnya.
       return redirect()->route('books.index')
           ->with('success','buku berhasil ditambah.');
    }

    /**
     * Menampilkan detail buku tertentu.
     *
     * @param  \App\Models\Book  $book Instance model Book yang ditemukan berdasarkan route model binding.
     * @return \Illuminate\View\View
     */
    public function show(Book $book): View
    {
        // Mengembalikan view 'books.show' dan menyertakan instance model buku.
        return view('books.show', compact('book'));

        // Baris-baris di bawah ini tidak akan pernah dieksekusi karena ada 'return' di atasnya.
        // Jika Anda ingin menampilkan detail buku dengan relasi reviews dan user-nya,
        // Anda bisa menghapus 'return view('books.show', compact('book'));' di atas
        // dan menggunakan kode di bawah ini.
        // $book->load('reviews.user'); // Memuat relasi 'reviews' dan relasi 'user' di dalam 'reviews'.
        // return view('nama_view_detail_kamu', compact('book')); // Mengembalikan view detail dengan data buku dan relasi yang dimuat.
    }

    /**
     * Menampilkan form untuk mengedit buku tertentu.
     *
     * @param  \App\Models\Book  $book Instance model Book yang ditemukan berdasarkan route model binding.
     * @return \Illuminate\View\View
     */
    public function edit(Book $book): View
    {
        // Mengembalikan view 'books.update' (atau 'books.edit', tergantung nama file view Anda)
        // dan menyertakan instance model buku yang akan diedit.
        return view('books.update', compact('book'));
    }

    /**
     * Memperbarui data buku tertentu di database.
     *
     * @param  \Illuminate\Http\Request  $request Objek request yang berisi data dari form.
     * @param  \App\Models\Book  $book Instance model Book yang ditemukan berdasarkan route model binding.
     * @return \Illuminate\Http\RedirectResponse Mengarahkan kembali ke halaman daftar buku.
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        // Melakukan validasi data yang diterima dari request, sama seperti metode store.
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

        // Memperbarui record buku di database menggunakan data dari request.
        // $request->all() mengembalikan array semua input dari request.
        // Ini aman karena model Book memiliki $fillable yang mendefinisikan kolom yang diizinkan.
        $book->update($request->all());

        // Mengarahkan kembali user ke halaman daftar buku setelah berhasil memperbarui.
        // Menambahkan pesan 'success' ke flash session.
        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Menghapus buku tertentu dari database.
     *
     * @param  \App\Models\Book  $book Instance model Book yang ditemukan berdasarkan route model binding.
     * @return \Illuminate\Http\RedirectResponse Mengarahkan kembali ke halaman daftar buku.
     */
    public function destroy(Book $book): RedirectResponse
    {
        // Menghapus record buku dari database.
        $book->delete();

        // Mengarahkan kembali user ke halaman daftar buku setelah berhasil menghapus.
        // Menambahkan pesan 'success' ke flash session.
        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }

    // Anda bisa menambahkan metode lain di sini sesuai kebutuhan,
    // misalnya untuk pencarian buku, filter, dll.
}
