# Project UAS Rekayasa Perangkat Lunak 

Nama: Marsya Nabila Putri

NIM: 312410338

Kelas: TI.24.A4 

# Aplikasi Sistem Informasi Perpustakaan 
Sistem Informasi Perpustakaan adalah aplikasi berbasis web yang digunakan untuk membantu pengelolaan data perpustakaan secara digital, mulai dari data anggota, data buku, proses peminjaman, pengembalian, perhitungan denda, hingga laporan.

Aplikasi ini dibuat untuk memudahkan admin dalam mengelola aktivitas perpustakaan agar lebih cepat, rapi, dan terstruktur.

## Link Hosting:

https://perpustakaan-app.gt.tc/auth/login.phphttps://perpustakaan-app.gt.tc/auth/login.php


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

## Index.php

```php
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Sistem Informasi Perpustakaan</h2>
<a href="buku/index.php">Kelola Data Buku</a>

</body>
</html>
```
File `index.php` berfungsi sebagai halaman utama Sistem Informasi Perpustakaan. Pada bagian `<head>`, halaman ini mengatur judul dan memanggil file `style.css` untuk mengatur tampilan. Di dalam `<body>`, ditampilkan judul sistem serta sebuah link yang mengarahkan pengguna ke halaman pengelolaan data buku. Halaman ini digunakan sebagai pintu masuk awal sebelum pengguna mengakses fitur-fitur lain dalam sistem.

## Login Admin

- *Username: admin*
- *Password: admin*

- `auth/login.php`

- `auth/logout.php`

- `proses_login.php`

<img width="952" height="1079" alt="Screenshot 2026-01-24 030033" src="https://github.com/user-attachments/assets/7f4207c1-4428-4a49-be44-c44c0b9b92b1" />


Fitur autentikasi admin berfungsi untuk membatasi akses ke dalam sistem. Proses login dilakukan dengan mencocokkan username dan password yang dimasukkan oleh admin dengan data yang tersimpan di database. Jika data sesuai, sistem akan membuat session sebagai tanda bahwa admin telah berhasil login dan mengizinkan akses ke dashboard serta seluruh menu. Session ini juga digunakan untuk menjaga keamanan agar halaman tidak bisa diakses langsung tanpa login.

## Dashboard Admin

- `dashboard.php`

<img width="954" height="1079" alt="image" src="https://github.com/user-attachments/assets/279ccf4b-f9ab-4746-bf7d-4ef5247cbced" />


Halaman dashboard berfungsi sebagai pusat navigasi sistem. Dashboard menampilkan menu utama yang mengarah ke pengelolaan anggota, buku, peminjaman, pengembalian, dan laporan. Dashboard juga menampilkan ringkasan informasi seperti jumlah anggota, jumlah buku, data peminjaman aktif, serta riwayat pengembalian. Dengan adanya dashboard, admin dapat langsung melihat kondisi umum sistem tanpa harus membuka setiap menu satu per satu.

## Data Anggota 

- `anggota/index.php`

- `anggota/tambah.php`

- `anggota/edit.php`

- `anggota/hapus.php`

- `anggota/proses_tambah.php`

- `anggota/proses_edit.php`

<img width="950" height="1076" alt="Screenshot 2026-01-23 210014" src="https://github.com/user-attachments/assets/5aa9fe44-0c90-4865-9f11-3aea5dc0cbc8" />

<img width="951" height="1077" alt="Screenshot 2026-01-23 210022" src="https://github.com/user-attachments/assets/b089285a-336d-47e0-be41-bac16b30fcf5" />

<img width="952" height="1079" alt="Screenshot 2026-01-23 210034" src="https://github.com/user-attachments/assets/5f2741f5-489b-4780-b690-688e4bb2db45" />

<img width="950" height="1046" alt="Screenshot 2026-01-23 210050" src="https://github.com/user-attachments/assets/156e792f-c5e6-42a7-8039-664b8d23eecb" />

Pengelolaan data anggota dilakukan melalui halaman anggota yang menerapkan fungsi CRUD. Admin dapat menambahkan anggota baru melalui form input, kemudian data tersebut disimpan ke dalam database. Data anggota yang tersimpan akan ditampilkan dalam tabel yang dapat diedit maupun dihapus sesuai kebutuhan. Proses edit memungkinkan admin memperbarui informasi anggota, sedangkan proses hapus digunakan untuk menghapus data anggota yang sudah tidak digunakan.

## Data Buku

- `buku/index.php`

- `buku.tambah.php`

- `buku/edit.php`

- `buku/hapus.php`

- `buku/proses_tambah.php`

- `buku/proses_edit.php`

<img width="947" height="1076" alt="Screenshot 2026-01-24 160904" src="https://github.com/user-attachments/assets/e8655e4b-b736-4e7c-805a-91aac126767e" />

<img width="952" height="1079" alt="image" src="https://github.com/user-attachments/assets/d228c10a-c8f2-4f1b-9d05-8372636c2fda" />

<img width="949" height="1079" alt="image" src="https://github.com/user-attachments/assets/69e9a6b1-dbf2-48d4-a4d8-875d01ac47bc" />

<img width="952" height="1079" alt="image" src="https://github.com/user-attachments/assets/097afa16-4200-4bca-ad90-ea3215a7a8a5" />


Fitur data buku juga menggunakan konsep CRUD yang sama. Admin dapat menambahkan data buku baru seperti judul, pengarang, penerbit, tahun terbit, dan stok buku. Data buku ini disimpan di database dan ditampilkan dalam tabel agar mudah dikelola. Fitur edit dan hapus pada data buku membantu admin dalam memperbarui informasi buku serta menjaga data tetap akurat.

## Peminjaman

- `peminjaman/index.php`

- `peminjaman/tambah.php`

- `peminjaman/kembali.php`

- `peminjaman/proses_tambah.php`

- `peminjaman/proses_kembali.php`

<img width="952" height="1079" alt="image" src="https://github.com/user-attachments/assets/8b601fa2-604e-4c2f-8f83-eb02a40cb54b" />


<img width="952" height="1079" alt="Screenshot 2026-01-23 210202" src="https://github.com/user-attachments/assets/9276a605-80d7-494d-b2a3-f9080f2ae9e7" />

Proses peminjaman buku digunakan untuk mencatat transaksi peminjaman oleh anggota. Saat peminjaman dilakukan, sistem akan menyimpan data anggota, tanggal peminjaman, dan status peminjaman ke dalam tabel peminjaman. Status awal peminjaman ditandai sebagai “Dipinjam” sehingga sistem dapat membedakan buku yang masih dipinjam dan yang sudah dikembalikan. Data peminjaman ini ditampilkan dalam halaman peminjaman agar admin dapat memantau buku yang sedang dipinjam.

## Pengembalian

- `pengembalian/index.php`

- `pengembalian/proses_pengembalian.php`

<img width="951" height="1079" alt="image" src="https://github.com/user-attachments/assets/4dbfef48-cbcc-4743-8cb4-2c24a5b43ff9" />


Fitur pengembalian buku berfungsi untuk mengubah status peminjaman ketika buku dikembalikan. pengembalian menampilkan seluruh data peminjaman yang telah dikembalikan. Informasi yang ditampilkan meliputi nama anggota, tanggal pinjam, tanggal kembali, status, dan denda. Halaman ini berfungsi sebagai arsip transaksi pengembalian sehingga admin dapat melihat histori pengembalian buku secara lengkap dan terstruktur.

## Laporan

- `laporan/index.php`

<img width="952" height="1077" alt="image" src="https://github.com/user-attachments/assets/63695e4c-e81a-4fda-ba15-5aea09b55446" />


Fitur laporan digunakan untuk menampilkan rekap data peminjaman, pengembalian, dan denda. Laporan ini berguna sebagai bahan evaluasi dan dokumentasi administrasi perpustakaan. Dengan adanya laporan, admin dapat mengetahui aktivitas perpustakaan secara keseluruhan dalam periode tertentu.














