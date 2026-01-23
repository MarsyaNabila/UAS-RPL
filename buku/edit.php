<?php
include "../config/koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Buku</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
  <h3>Edit Buku</h3>
  <a href="index.php">Kembali</a>
</div>

<div class="card">
  <h2>Form Edit Buku</h2>
  <form action="proses_edit.php" method="post">
  <input type="hidden" name="id_buku" value="<?= $row['id_buku']; ?>">

  <label>Judul Buku</label>
  <input type="text" name="judul" value="<?= $row['judul']; ?>" required>

  <label>Pengarang</label>
  <input type="text" name="pengarang" value="<?= $row['pengarang']; ?>" required>

  <label>Penerbit</label>
  <input type="text" name="penerbit" value="<?= $row['penerbit']; ?>" required>

  <label>Tahun Terbit</label>
  <input type="number" name="tahun_terbit" value="<?= $row['tahun_terbit']; ?>" required>

  <label>Stok</label>
  <input type="number" name="stok" value="<?= $row['stok']; ?>" required>

  <button type="submit">Update</button>
</form>
</div>

</body>
</html>
