<?php
include "../config/koneksi.php";

// ambil data buku (urut sama seperti phpMyAdmin)
$data = mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Buku</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
  <h3>Data Buku</h3>
  <a href="../dashboard.php">Dashboard</a>
</div>

<div class="card">
  <a href="tambah.php" class="btn">+ Tambah Buku</a>

  <table>
    <tr>
      <th>ID Buku</th>
      <th>Gambar</th>
      <th>Judul</th>
      <th>Penulis</th>
      <th>Penerbit</th>
      <th>Tahun</th>
      <th>Stok</th>
      <th>Aksi</th>
    </tr>

    <?php if(mysqli_num_rows($data) > 0): ?>
      <?php while($row = mysqli_fetch_assoc($data)): ?>
        <tr>
          <td><?= $row['id_buku'] ?></td>

          <td>
            <?php if(!empty($row['gambar'])): ?>
              <img src="../img/<?= $row['gambar'] ?>" width="60" style="border-radius:6px">
            <?php else: ?>
              <span style="color:#999">No Image</span>
            <?php endif; ?>
          </td>

          <td><?= $row['judul'] ?></td>
          <td><?= $row['pengarang'] ?></td>
          <td><?= $row['penerbit'] ?></td>
          <td><?= $row['tahun_terbit'] ?></td>
          <td><?= $row['stok'] ?></td>

          <td>
            <a href="edit.php?id=<?= $row['id_buku'] ?>" class="action-btn action-edit">
              Edit
            </a>
            <a href="hapus.php?id=<?= $row['id_buku'] ?>" 
               class="action-btn action-hapus"
               onclick="return confirm('Yakin hapus buku ini?')">
              Hapus
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td colspan="8" style="text-align:center">
          Belum ada data buku
        </td>
      </tr>
    <?php endif; ?>
  </table>
</div>

</body>
</html>
