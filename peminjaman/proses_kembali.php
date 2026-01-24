<?php
include "../config/koneksi.php";

$id = $_POST['id_peminjaman'];

$data = mysqli_query($conn, "
  SELECT tanggal_kembali
  FROM peminjaman
  WHERE id_peminjaman='$id'
");

$row = mysqli_fetch_assoc($data);

$tgl_kembali = $row['tanggal_kembali'];
$hari_ini = date('Y-m-d');

$telat = (strtotime($hari_ini) - strtotime($tgl_kembali)) / (60*60*24);
$telat = $telat > 0 ? $telat : 0;

$denda = $telat * 2000;

mysqli_query($conn, "
  UPDATE peminjaman SET
    status='Dikembalikan',
    denda='$denda'
  WHERE id_peminjaman='$id'
");

header("Location: ../pengembalian/index.php");
exit;
