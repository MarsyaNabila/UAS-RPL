<?php
include "../config/koneksi.php";
$data = mysqli_query($conn, "SELECT * FROM anggota");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Anggota</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
  <h3>Data Anggota</h3>
  <a href="../dashboard.php">Dashboard</a>
</div>

<div class="card">
  <h2>Daftar Anggota</h2>
  <a href="tambah.php" class="btn">+ Tambah Anggota</a>

  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>No Telp</th>
      <th>Aksi</th>
    </tr>

    <?php if (mysqli_num_rows($data) > 0): ?>
      <?php $no = 1; while ($row = mysqli_fetch_assoc($data)): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td><?= $row['no_telp'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id_anggota'] ?>"
            class="action-btn action-edit">Edit</a>
            
            <a href="hapus.php?id=<?= $row['id_anggota'] ?>"
            class="action-btn action-hapus"
            onclick="return confirm('Yakin ingin menghapus data ini?')">
             Hapus
            </a>
        </td>
      </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td colspan="5">Data anggota belum tersedia</td>
      </tr>
    <?php endif; ?>

  </table>
</div>

</body>
</html>
