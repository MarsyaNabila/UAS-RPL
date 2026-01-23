# Project UAS Rekayasa Perangkat Lunak 

Nama: Marsya Nabila Putri

NIM: 312410338

Kelas: TI.24.A4 

# Aplikasi Sistem Informasi Perpustakaan 
Sistem Informasi Perpustakaan adalah aplikasi berbasis web yang digunakan untuk membantu pengelolaan data perpustakaan secara digital, mulai dari data anggota, data buku, proses peminjaman, pengembalian, perhitungan denda, hingga laporan.

Aplikasi ini dibuat untuk memudahkan admin dalam mengelola aktivitas perpustakaan agar lebih cepat, rapi, dan terstruktur.

## config (`koneksi.php`)

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "db_perpustakaan");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
```

Aplikasi Sistem Informasi Perpustakaan ini dibangun menggunakan PHP dan MySQL dengan konsep CRUD sebagai inti pengelolaan data. Seluruh koneksi database dipusatkan pada file `koneksi.php` agar setiap halaman dapat mengakses database dengan cara yang konsisten dan lebih mudah dikelola. File ini berfungsi sebagai penghubung antara aplikasi dan database MySQL sehingga seluruh proses pengambilan, penyimpanan, dan pengolahan data dapat berjalan dengan baik.

## Login Admin

- `auth/login.php`

- `auth/logout.php`

- `proses_login.php`

<img width="952" height="1079" alt="Screenshot 2026-01-23 205933" src="https://github.com/user-attachments/assets/0c5b1b2c-81ff-43ca-80dc-61b813335c4c" />

Fitur autentikasi admin berfungsi untuk membatasi akses ke dalam sistem. Proses login dilakukan dengan mencocokkan username dan password yang dimasukkan oleh admin dengan data yang tersimpan di database. Jika data sesuai, sistem akan membuat session sebagai tanda bahwa admin telah berhasil login dan mengizinkan akses ke dashboard serta seluruh menu. Session ini juga digunakan untuk menjaga keamanan agar halaman tidak bisa diakses langsung tanpa login.

## Dashboard Admin

- `dashboard.php`

<img width="952" height="1079" alt="Screenshot 2026-01-23 210002" src="https://github.com/user-attachments/assets/21e5433c-243e-4872-901e-756842d53f37" />

Halaman dashboard berfungsi sebagai pusat navigasi sistem. Dashboard menampilkan menu utama yang mengarah ke pengelolaan anggota, buku, peminjaman, pengembalian, dan laporan. Dashboard juga menampilkan ringkasan informasi seperti jumlah anggota, jumlah buku, data peminjaman aktif, serta riwayat pengembalian. Dengan adanya dashboard, admin dapat langsung melihat kondisi umum sistem tanpa harus membuka setiap menu satu per satu.

## Data Anggota 

- `anggota/index.php`

- `anggota/tambah.php`

- `anggota/edit.php`

- `anggota/hapus.php`

- `anggota/proses_tambah.php`

- `anggota/proses_edit.php`

<img width="950" height="1076" alt="Screenshot 2026-01-23 210014" src="https://github.com/user-attachments/assets/8d303503-19aa-4a7a-a46c-710dfc9ded86" />

<img width="951" height="1077" alt="Screenshot 2026-01-23 210022" src="https://github.com/user-attachments/assets/b089285a-336d-47e0-be41-bac16b30fcf5" />

<img width="952" height="1079" alt="Screenshot 2026-01-23 210034" src="https://github.com/user-attachments/assets/5f2741f5-489b-4780-b690-688e4bb2db45" />

<img width="950" height="1046" alt="Screenshot 2026-01-23 210050" src="https://github.com/user-attachments/assets/156e792f-c5e6-42a7-8039-664b8d23eecb" />





