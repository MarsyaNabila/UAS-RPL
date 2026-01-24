<?php
include "../config/koneksi.php";

$id      = $_POST['id_anggota'];
$nama    = $_POST['nama'];
$alamat  = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

$query = "UPDATE anggota SET
          nama='$nama',
          alamat='$alamat',
          no_telp='$no_telp'
          WHERE id_anggota='$id'";

mysqli_query($conn, $query);

header("Location: index.php");
