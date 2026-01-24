<?php
include "../config/koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Anggota</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
  <h3>Edit Anggota</h3>
  <a href="index.php">Kembali</a>
</div>

<div class="card">
  <h2>Form Edit Anggota</h2>

  <form action="proses_edit.php" method="post">
    <input type="hidden" name="id_anggota" value="<?= $row['id_anggota']; ?>">

    <label>Nama</label>
    <input type="text" name="nama" value="<?= $row['nama']; ?>" required>

    <label>Alamat</label>
    <input type="text" name="alamat" value="<?= $row['alamat']; ?>" required>

    <label>No Telepon</label>
    <input type="text" name="no_telp" value="<?= $row['no_telp']; ?>" required>

    <button type="submit">Update</button>
  </form>
</div>

</body>
</html>
