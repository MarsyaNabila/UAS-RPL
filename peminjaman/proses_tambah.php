<?php
include "../config/koneksi.php";

$id_anggota = $_POST['id_anggota'];
$tgl_pinjam = $_POST['tanggal_pinjam'];

mysqli_query($conn,"
  INSERT INTO peminjaman
  (id_anggota, tanggal_pinjam, status)
  VALUES
  ('$id_anggota','$tgl_pinjam','Dipinjam')
");

header("Location: index.php");
