# 📚 Sistem Peminjaman Perpustakaan

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat&logo=php)
![Laravel](https://img.shields.io/badge/Laravel-10-FF2D20?style=flat&logo=laravel)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/license-MIT-green)

Aplikasi web CRUD sederhana untuk mengelola proses peminjaman buku di perpustakaan, dibangun dengan **Laravel** dan **MySQL**. Project ini dibuat untuk melatih penerapan konsep MVC, relasi database, serta business logic sederhana (pengelolaan stok otomatis).

## ✨ Fitur

- **Manajemen Buku** — tambah, lihat, ubah, hapus data buku beserta stoknya
- **Manajemen Anggota** — data anggota perpustakaan
- **Transaksi Peminjaman**
  - Buku dengan stok habis tidak bisa dipinjam
  - Stok otomatis berkurang saat buku dipinjam
  - Stok otomatis bertambah kembali saat status diubah menjadi "dikembalikan"
  - Riwayat lengkap tanggal pinjam & tanggal kembali
- Validasi form di setiap input
- Pagination pada setiap daftar data

## 🖼️ Screenshot

<img width="1919" height="944" alt="image" src="https://github.com/user-attachments/assets/2d5b71b3-1661-4019-8012-23815f09d020" />
<img width="1919" height="941" alt="image" src="https://github.com/user-attachments/assets/9395ef1a-84fb-469c-8a9a-36cbc4689828" />
<img width="1917" height="938" alt="image" src="https://github.com/user-attachments/assets/7d116af2-17d4-456a-931b-240411c4d730" />

## 🛠️ Tech Stack

- **Backend:** Laravel 10 (PHP 8.2)
- **Database:** MySQL
- **Frontend:** Blade Templating + Bootstrap 5
- **Arsitektur:** MVC (Model-View-Controller)

## 🗂️ Struktur Database (ERD)

```
buku                     peminjaman                  anggota
┌───────────────┐        ┌──────────────────┐        ┌───────────────┐
│ id            │───┐    │ id               │    ┌───│ id            │
│ kode_buku     │   └───▶│ buku_id (FK)     │    │   │ nama          │
│ judul         │        │ anggota_id (FK)  │◀───┘   │ alamat        │
│ penulis       │        │ tanggal_pinjam   │        │ no_telp       │
│ penerbit      │        │ tanggal_kembali  │        │ email         │
│ tahun_terbit  │        │ status           │        └───────────────┘
│ stok          │        └──────────────────┘
└───────────────┘
```

- Satu **buku** bisa punya banyak **peminjaman** (`hasMany`)
- Satu **anggota** bisa punya banyak **peminjaman** (`hasMany`)
- Satu **peminjaman** merujuk ke satu **buku** dan satu **anggota** (`belongsTo`)

## 🚀 Instalasi

```bash
# 1. Clone repository
git clone https://github.com/username/laravel-perpustakaan.git
cd laravel-perpustakaan

# 2. Install dependency
composer install

# 3. Salin file environment
cp .env.example .env
php artisan key:generate

# 4. Atur koneksi database di .env
DB_CONNECTION=mysql
DB_DATABASE=perpustakaan
DB_USERNAME=root
DB_PASSWORD=

# 5. Buat database "perpustakaan" di MySQL, lalu jalankan migrasi
php artisan migrate

# 6. Jalankan server
php artisan serve
```

Buka `http://127.0.0.1:8000` di browser.

## 📁 Struktur Project (bagian penting)

```
app/
├── Models/                  # Buku, Anggota, Peminjaman
└── Http/Controllers/        # Logic CRUD tiap modul
database/migrations/         # Struktur tabel
resources/views/             # Tampilan Blade per modul
routes/web.php                # Definisi route
```

## 🗺️ Rencana Pengembangan

- [ ] Autentikasi login untuk admin/petugas
- [ ] Fitur pencarian & filter data
- [ ] Denda keterlambatan pengembalian
- [ ] Export laporan peminjaman ke Excel/PDF

## 👤 Author

**Nama Kamu**
- GitHub: [@adisanjaya-pemula](https://github.com/adisanjaya-pemula)

## 📄 Lisensi

Project ini menggunakan lisensi [MIT](LICENSE).
