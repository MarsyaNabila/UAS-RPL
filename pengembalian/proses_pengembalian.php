<?php
include "../config/koneksi.php";

$id = $_GET['id'];
$today = date('Y-m-d');

// ambil tanggal kembali seharusnya
$data = mysqli_fetch_assoc(mysqli_query($conn,"
  SELECT tanggal_kembali FROM peminjaman WHERE id_peminjaman='$id'
"));

$tgl_seharusnya = $data['tanggal_kembali'];

$telat = max(0, (strtotime($today) - strtotime($tgl_seharusnya)) / 86400);
$denda = $telat * 2000;

mysqli_query($conn,"
  UPDATE peminjaman SET
  status='Dikembalikan',
  denda='$denda',
  tanggal_kembali='$today'
  WHERE id_peminjaman='$id'
");

header("Location: index.php");
