# Employee CRUD Laravel

Aplikasi web sederhana untuk pengelolaan data karyawan berbasis Laravel dan Bootstrap 5.

## Fitur

- Tambah, lihat, edit, dan hapus data karyawan (CRUD)
- Ringkasan statistik (total karyawan, departemen, estimasi gaji)
- Validasi input form
- Notifikasi aksi (flash message)

## Cara Menjalankan

1. Clone repository:
   ```bash
   git clone https://github.com/rafliaraf/employee-crud-laravel.git
   cd employee-crud-laravel
   ```

2. Install dependensi:
   ```bash
   composer install
   npm install
   ```

3. Setup environment & key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Migrasi database:
   ```bash
   php artisan migrate --seed
   ```

5. Jalankan server:
   ```bash
   php artisan serve
   ```
   Buka di browser: `http://localhost:8000`

## Lisensi

[MIT](LICENSE)