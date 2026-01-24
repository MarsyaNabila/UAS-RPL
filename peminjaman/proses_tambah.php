<?php
include "../config/koneksi.php";

$id_anggota = $_POST['id_anggota'];
$tgl_pinjam = $_POST['tanggal_pinjam'];
$id_admin   = 1; // dari session nanti

mysqli_query($conn,"
  INSERT INTO peminjaman
  (id_anggota, id_admin, tanggal_pinjam, status)
  VALUES
  ('$id_anggota', '$id_admin', '$tgl_pinjam', 'Dipinjam')
");

header("Location: index.php");
