README - Sistem Manajemen Pegawai (CRUD)

Sistem ini adalah aplikasi berbasis web menggunakan Laravel 11/12 untuk mengelola data pegawai, jabatan, dan unit kerja. Aplikasi ini dibangun untuk memenuhi kriteria uji kompetensi teknis.
Fitur Utama:

    CRUD Pegawai: Kelola data lengkap dengan relasi Jabatan dan Unit Kerja.

    CRUD Jabatan: Kelola master data jabatan.

    CRUD Unit Kerja: Kelola master data unit organisasi.

    Fitur Tambahan:

        Pencarian (Search): Mendukung pencarian case-insensitive (huruf besar/kecil) untuk nama, NIP, Jabatan, dan Unit Kerja.

        Pagination: Pembagian halaman data agar tampilan tetap rapi.

        Flash Messages: Notifikasi sukses untuk setiap aksi (Simpan, Edit, Hapus).

        UI/UX: Menggunakan Tailwind CSS untuk tampilan yang responsif dan bersih.

Prasyarat (Prerequisites)

Pastikan perangkat Anda sudah terinstall:

    PHP >= 8.2

    Composer

    PostgreSQL atau MySQL

    Node.js & NPM

Cara Menjalankan Aplikasi

    Ekstrak File Ekstrak file .zip ini ke folder direktori web Anda.

    Install Dependensi Buka terminal di dalam folder proyek, lalu jalankan:
    Bash

composer install
npm install && npm run build

Konfigurasi Database Salin file .env.example menjadi .env:
Bash

cp .env.example .env

Buka file .env dan sesuaikan pengaturan database Anda:
Code snippet

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nama_database_anda
DB_USERNAME=postgres
DB_PASSWORD=password_anda

Generate Key & Migrasi Jalankan perintah berikut untuk menyiapkan database:
Bash

php artisan key:generate
php artisan migrate

Jalankan Server
Bash

    php artisan serve

    Akses aplikasi di browser pada alamat: http://127.0.0.1:8000

Akun Login Dasar

Jika sistem menggunakan sistem login (Breeze/Jetstream), Anda dapat mendaftar melalui menu Register di halaman utama untuk mulai menggunakan sistem.
