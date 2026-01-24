<?php
include "../config/koneksi.php";

// ambil data form
$judul     = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit  = $_POST['penerbit'];
$tahun     = $_POST['tahun_terbit'];
$stok      = $_POST['stok'];

// ================== UPLOAD GAMBAR ==================
$nama_file   = $_FILES['gambar']['name'];
$tmp_file    = $_FILES['gambar']['tmp_name'];
$folder      = "../img/buku/";

// buat nama file unik biar tidak bentrok
$ext         = pathinfo($nama_file, PATHINFO_EXTENSION);
$nama_baru   = "buku_" . time() . "." . $ext;

// validasi upload
if ($nama_file != "") {
    move_uploaded_file($tmp_file, $folder . $nama_baru);
} else {
    $nama_baru = "default.png"; // opsional kalau mau cover default
}

// ================== SIMPAN KE DATABASE ==================
$query = "
  INSERT INTO buku 
  (judul, pengarang, penerbit, tahun_terbit, stok, gambar)
  VALUES 
  ('$judul', '$pengarang', '$penerbit', '$tahun', '$stok', '$nama_baru')
";

mysqli_query($conn, $query);

// ================== REDIRECT ==================
header("Location: index.php");
exit;
