<?php

namespace App\Models; // Mendefinisikan namespace untuk model ini.

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk menggunakan model factories.
use Illuminate\Database\Eloquent\Model; // Mengimpor kelas dasar Model dari Eloquent.
use Illuminate\Database\Eloquent\Relations\HasMany; // Mengimpor kelas HasMany untuk mendefinisikan relasi one-to-many.
use Illuminate\Database\Eloquent\Relations\HasOne; // Mengimpor kelas HasOne untuk mendefinisikan relasi one-to-one.

/**
 * Kelas Books merepresentasikan model untuk tabel 'books' dalam database.
 * Model ini menggunakan Eloquent ORM Laravel untuk berinteraksi dengan database.
 */
class Books extends Model
{
    use HasFactory; // Menggunakan trait HasFactory untuk memungkinkan pembuatan instance model menggunakan factory.

    /**
     * The attributes that are mass assignable.
     *
     * Properti $fillable mendefinisikan kolom-kolom mana saja dalam tabel database
     * yang boleh diisi (mass assigned) menggunakan metode create() atau update()
     * pada model. Ini adalah fitur keamanan untuk mencegah serangan mass assignment.
     * Hanya kolom yang terdaftar di sini yang bisa diisi secara langsung dari array input.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title', // Judul buku
        'author', // Penulis buku
        'publisher', // Penerbit buku
        'publication', // Tahun publikasi buku
        'isbn', // ISBN buku
        'category', // Kategori buku
        'pages', // Jumlah halaman buku
        'language', // Bahasa buku
        'call_number', // Nomor panggil buku (untuk perpustakaan)
        'shelf_location', // Lokasi rak buku
        'stock', // Jumlah stok buku yang tersedia
        'total_stock', // Jumlah total stok buku (termasuk yang dipinjam)
        'description', // Deskripsi atau sinopsis buku
        'cover_image', // Nama file atau path gambar sampul buku
        'tags', // Tag atau kata kunci terkait buku (bisa dalam format string, JSON, dll. tergantung implementasi)
    ];

    // Di sini Anda bisa mendefinisikan relasi antar model, misalnya:

    /**
     * Get the borrowings for the book.
     *
     * Mendefinisikan relasi one-to-many: Satu buku bisa memiliki banyak catatan peminjaman.
     * public function borrowings(): HasMany
     * {
     * return $this->hasMany(Borrowing::class);
     * }
     */

    /**
     * Get the details associated with the book.
     *
     * Mendefinisikan relasi one-to-one (jika ada tabel detail terpisah).
     * public function details(): HasOne
     * {
     * return $this->hasOne(BookDetails::class);
     * }
     */

    // Dan metode atau properti kustom lainnya untuk model Books.
}
