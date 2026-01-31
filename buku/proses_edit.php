<?php
include "../config/koneksi.php";

$id        = $_POST['id_buku'];
$judul     = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit  = $_POST['penerbit'];
$tahun     = $_POST['tahun_terbit'];
$stok      = $_POST['stok'];

$query = "UPDATE buku SET
          judul='$judul',
          pengarang='$pengarang',
          penerbit='$penerbit',
          tahun_terbit='$tahun',
          stok='$stok'
          WHERE id_buku='$id'";

mysqli_query($conn, $query);

header("Location: index.php");
