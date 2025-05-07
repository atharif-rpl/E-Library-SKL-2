<?php

namespace App\Models; // Mendefinisikan namespace untuk model ini.

// use Illuminate\Contracts\Auth\MustVerifyEmail; // Mengimpor interface MustVerifyEmail (dikomentari di sini, digunakan untuk fitur verifikasi email).
use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk menggunakan model factories.
use Illuminate\Foundation\Auth\User as Authenticatable; // Mengimpor kelas dasar Authenticatable dari Laravel, yang menyediakan fungsionalitas otentikasi.
use Illuminate\Notifications\Notifiable; // Mengimpor trait Notifiable untuk menggunakan sistem notifikasi Laravel.
// Jika menggunakan Laravel Sanctum untuk API Token, pastikan ini di-uncomment:
// use Laravel\Sanctum\HasApiTokens; // Mengimpor trait HasApiTokens dari Sanctum untuk manajemen token API.

/**
 * Kelas User merepresentasikan model untuk tabel 'users' dalam database.
 * Model ini memperluas kelas Authenticatable, yang berarti model ini dapat digunakan
 * untuk proses otentikasi user (login, logout, dll.) di Laravel.
 */
class User extends Authenticatable
{
    /**
     * Menggunakan trait HasFactory untuk memungkinkan pembuatan instance model menggunakan factory.
     * Trait Notifiable memungkinkan model ini menerima notifikasi (misalnya, reset password).
     * @use HasFactory<\Database\Factories\UserFactory> // Komentar PHPDoc yang menunjukkan penggunaan factory.
     */
    use HasFactory, Notifiable;
    // Jika menggunakan Laravel Sanctum untuk API Token, tambahkan HasApiTokens di sini:
    // use HasApiTokens, HasFactory, Notifiable; // Contoh penggunaan trait HasApiTokens bersama trait lainnya.


    /**
     * The attributes that are mass assignable.
     *
     * Properti $fillable mendefinisikan kolom-kolom mana saja dalam tabel database
     * yang boleh diisi (mass assigned) menggunakan metode create() atau update()
     * pada model. Ini adalah fitur keamanan untuk mencegah serangan mass assignment.
     * Hanya kolom yang terdaftar di sini yang bisa diisi secara langsung dari array input.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', // Nama user
        'email', // Alamat email user (biasanya unik)
        'password', // Password user (harus di-hash sebelum disimpan)
        'role', // Kolom role user (misalnya 'admin', 'user', dll.). Ini SANGAT PENTING dan sudah ada di sini.
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * Properti $hidden mendefinisikan kolom-kolom mana saja yang tidak boleh
     * disertakan saat model diubah menjadi array atau JSON. Ini biasanya
     * digunakan untuk menyembunyikan informasi sensitif seperti password.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password', // Menyembunyikan password untuk keamanan.
        'remember_token', // Menyembunyikan remember_token yang digunakan untuk fitur "remember me".
    ];

    /**
     * Get the attributes that should be cast.
     *
     * Metode casts() mendefinisikan tipe data asli untuk kolom-kolom tertentu
     * saat mereka diambil dari database. Ini memastikan bahwa kolom-kolom
     * tersebut diubah ke tipe data PHP yang sesuai (misalnya, string ke datetime, string ke boolean, dll.).
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Mengubah nilai kolom 'email_verified_at' menjadi instance Carbon (datetime object).
            'password' => 'hashed', // Laravel 10+ akan otomatis menghash password saat diset jika cast ini ada.
                                    // Ini menggantikan kebutuhan untuk menghash password secara manual di controller atau mutator.
        ];
    }

    /**
     * Check if user is an admin.
     *
     * Metode helper ini menyediakan cara mudah untuk memeriksa apakah user
     * memiliki role 'admin'.
     *
     * @return bool Mengembalikan true jika role user adalah 'admin', false jika sebaliknya.
     */
    public function isAdmin(): bool
    {
        // Membandingkan nilai kolom 'role' dengan string 'admin'.
        return $this->role === 'admin';
    }

    

    // Anda bisa tambahkan metode atau relasi lain di sini jika diperlukan, misalnya:
    // public function posts(): HasMany { ... } // Relasi one-to-many ke model Post.
    // public function profile(): HasOne { ... } // Relasi one-to-one ke model Profile.
}
