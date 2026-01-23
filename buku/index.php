<?php
include "../config/koneksi.php";
$data = mysqli_query($conn, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Buku</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
  <h3>Data Buku</h3>
  <a href="../dashboard.php">Dashboard</a>
</div>

<div class="card">
  <h2>Daftar Buku</h2>
  <a href="tambah.php" class="btn">+ Tambah Buku</a>

  <table>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Pengarang</th>
      <th>Penerbit</th>
      <th>Tahun</th>
      <th>Stok</th>
      <th>Aksi</th>
    </tr>

    <?php if (mysqli_num_rows($data) > 0): ?>
      <?php $no = 1; while ($row = mysqli_fetch_assoc($data)): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['judul'] ?></td>
        <td><?= $row['pengarang'] ?></td>
        <td><?= $row['penerbit'] ?></td>
        <td><?= $row['tahun_terbit'] ?></td>
        <td><?= $row['stok'] ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id_buku'] ?>" class="action-btn action-edit">Edit</a>
          <a href="hapus.php?id=<?= $row['id_buku'] ?>" class="action-btn action-hapus"
             onclick="return confirm('Hapus buku ini?')">
             Hapus
            </a>
        </td>
      </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td colspan="7">Data buku belum tersedia</td>
      </tr>
    <?php endif; ?>
  </table>
</div>

</body>
</html>
