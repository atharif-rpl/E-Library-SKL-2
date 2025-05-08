<?php

namespace App\Http\Controllers; // Mendefinisikan namespace untuk controller ini.

use App\Models\Book; // Mengimpor model Books untuk berinteraksi dengan tabel 'books'.
use App\Models\User; // Mengimpor model User untuk berinteraksi dengan tabel 'users'.
use Illuminate\Http\Request; // Mengimpor class Request (meskipun tidak digunakan secara langsung di metode index, ini adalah impor umum).

/**
 * Kelas DashboardController bertanggung jawab untuk menangani request terkait halaman dashboard.
 * Controller ini menampilkan ringkasan data seperti jumlah buku dan user, serta daftar buku terbaru.
 */
class DashboardController extends Controller // Memperluas kelas dasar Controller untuk mewarisi fungsionalitas umum.
{
      /**
     * Create a new controller instance
     *
     * Konstruktor controller. Metode ini dijalankan saat instance controller dibuat.
     * Di sini, kita menerapkan middleware 'auth' ke seluruh metode di controller ini.
     * Ini berarti bahwa user harus login (terotentikasi) untuk bisa mengakses
     * metode apapun di dalam DashboardController.
     *
     * @return void
     */
    public function __construct()
    {
        // Menerapkan middleware 'auth'. Middleware ini akan memeriksa apakah user
        // sudah login. Jika belum, user akan diarahkan ke halaman login
        // (sesuai konfigurasi middleware 'auth' di Kernel.php dan Authenticate.php).
        $this->middleware('auth');
    }

    /**
     * Display the dashboard view.
     *
     * Metode ini bertanggung jawab untuk mengumpulkan data yang dibutuhkan
     * untuk ditampilkan di halaman dashboard dan kemudian menampilkan view dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable Mengembalikan instance Renderable (biasanya View).
     */
    public function index()
    {
        // Menghitung total jumlah buku dalam tabel 'books'.
        $totalBooks = Book::count();

        // Menghitung total jumlah user dengan role 'user'.
        // User::where('role', 'user') membuat query untuk memilih user di mana kolom 'role' bernilai 'user'.
        // count() menjalankan query dan mengembalikan jumlah hasilnya.
        $totalUsers = User::where('role', 'user')->count();

        // Mengambil 5 buku terbaru dari tabel 'books'.
        // Books::latest() mengurutkan hasil berdasarkan kolom 'created_at' secara descending.
        // take(5) membatasi hasil hanya 5 record pertama.
        // get() menjalankan query dan mengembalikan koleksi hasil.
        $books = Book::latest()->take(5)->get();

        // Mengembalikan view 'dashboard.index'.
        // compact('totalBooks', 'totalUsers', 'books') adalah cara singkat untuk
        // meneruskan variabel $totalBooks, $totalUsers, dan $books ke view
        // dalam bentuk array: ['totalBooks' => $totalBooks, 'totalUsers' => $totalUsers, 'books' => $books].
        return view('dashboard.index', compact('totalBooks', 'totalUsers', 'books'));
    }

    // Anda bisa menambahkan metode lain di sini jika diperlukan untuk fungsionalitas dashboard tambahan.
}
