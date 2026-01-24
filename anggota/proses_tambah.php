<?php
include "../config/koneksi.php";

$nama    = $_POST['nama'];
$alamat  = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

$query = "INSERT INTO anggota (nama, alamat, no_telp)
          VALUES ('$nama', '$alamat', '$no_telp')";

mysqli_query($conn, $query);

header("Location: index.php");
