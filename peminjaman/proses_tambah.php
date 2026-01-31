<?php
include "../config/koneksi.php";

// ambil data dari form
$id_anggota      = $_POST['id_anggota'];
$id_buku         = $_POST['id_buku'];
$tanggal_pinjam  = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];

// validasi sederhana
if (
  empty($id_anggota) ||
  empty($id_buku) ||
  empty($tanggal_pinjam) ||
  empty($tanggal_kembali)
) {
  echo "<script>
          alert('Data peminjaman belum lengkap');
          history.back();
        </script>";
  exit;
}

// cek stok buku
$cek = mysqli_query($conn, "
  SELECT stok FROM buku WHERE id_buku = '$id_buku'
");
$data_buku = mysqli_fetch_assoc($cek);

if ($data_buku['stok'] <= 0) {
  echo "<script>
          alert('Stok buku habis');
          window.location='tambah.php';
        </script>";
  exit;
}

// simpan data peminjaman
$simpan = mysqli_query($conn, "
  INSERT INTO peminjaman
  (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali, status, denda)
  VALUES
  ('$id_anggota', '$id_buku', '$tanggal_pinjam', '$tanggal_kembali', 'Dipinjam', 0)
");

// kurangi stok buku
if ($simpan) {
  mysqli_query($conn, "
    UPDATE buku
    SET stok = stok - 1
    WHERE id_buku = '$id_buku'
  ");

  echo "<script>
          alert('Peminjaman berhasil disimpan');
          window.location='index.php';
        </script>";
} else {
  echo "<script>
          alert('Gagal menyimpan peminjaman');
          history.back();
        </script>";
}
