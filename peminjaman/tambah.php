<?php
include "../config/koneksi.php";
$anggota = mysqli_query($conn,"SELECT * FROM anggota");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Peminjaman</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
  <h3>Tambah Peminjaman</h3>
  <a href="index.php">Kembali</a>
</div>

<div class="card">
<form action="proses_tambah.php" method="post">

  <label>Nama Anggota</label>
  <select name="id_anggota" required>
    <option value="">-- Pilih Anggota --</option>
    <?php while($a=mysqli_fetch_assoc($anggota)): ?>
      <option value="<?= $a['id_anggota'] ?>">
        <?= $a['nama'] ?>
      </option>
    <?php endwhile; ?>
  </select>

  <label>Tanggal Pinjam</label>
  <input type="date" name="tanggal_pinjam" required>

  <button type="submit">Simpan</button>

</form>
</div>

</body>
</html>
