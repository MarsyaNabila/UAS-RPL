<?php
include "../config/koneksi.php";

$id = $_GET['id'] ?? 0;

// ambil data peminjaman
$q = mysqli_query($conn,"
  SELECT tanggal_kembali
  FROM peminjaman
  WHERE id_peminjaman = '$id'
");

$data = mysqli_fetch_assoc($q);

$tgl_seharusnya = $data['tanggal_kembali'];
$tgl_hari_ini = date('Y-m-d');

// hitung keterlambatan
$terlambat = (strtotime($tgl_hari_ini) - strtotime($tgl_seharusnya)) / 86400;
$terlambat = $terlambat > 0 ? $terlambat : 0;

// denda per hari
$denda_per_hari = 2000;
$total_denda = $terlambat * $denda_per_hari;

// update data
mysqli_query($conn,"
  UPDATE peminjaman SET
    status='Dikembalikan',
    tanggal_kembali='$tgl_hari_ini',
    denda='$total_denda'
  WHERE id_peminjaman='$id'
");

header("Location: index.php");
exit;
