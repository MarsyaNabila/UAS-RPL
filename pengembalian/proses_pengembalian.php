<?php
include "../config/koneksi.php";

$id = $_GET['id'];

// ambil data peminjaman
$data = mysqli_fetch_assoc(mysqli_query($conn,"
  SELECT tanggal_pinjam 
  FROM peminjaman 
  WHERE id_peminjaman='$id'
"));

$tgl_pinjam  = $data['tanggal_pinjam'];
$tgl_kembali = date('Y-m-d');

// hitung selisih hari
$selisih = (strtotime($tgl_kembali) - strtotime($tgl_pinjam)) / 86400;

// aturan denda
$denda = 0;
$max_hari = 7;
if($selisih > $max_hari){
  $denda = ($selisih - $max_hari) * 2000;
}

mysqli_query($conn,"
  UPDATE peminjaman SET
    tanggal_kembali = '$tgl_kembali',
    status = 'Dikembalikan',
    denda = '$denda'
  WHERE id_peminjaman = '$id'
");

header("Location: index.php");
