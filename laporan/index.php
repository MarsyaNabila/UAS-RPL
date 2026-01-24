<?php
include "../config/koneksi.php";

/* Total peminjaman */
$q_peminjaman = mysqli_query($conn, "SELECT COUNT(*) total FROM peminjaman");
$total_peminjaman = mysqli_fetch_assoc($q_peminjaman)['total'];

/* Total pengembalian */
$q_pengembalian = mysqli_query($conn, "SELECT COUNT(*) total FROM peminjaman WHERE status='Dikembalikan'");
$total_pengembalian = mysqli_fetch_assoc($q_pengembalian)['total'];

/* Total denda */
$q_denda = mysqli_query($conn, "SELECT SUM(denda) total FROM peminjaman WHERE status='Dikembalikan'");
$total_denda = mysqli_fetch_assoc($q_denda)['total'] ?? 0;

/* Data laporan */
$data = mysqli_query($conn, "
  SELECT p.*, a.nama
  FROM peminjaman p
  JOIN anggota a ON p.id_anggota = a.id_anggota
  ORDER BY p.id_peminjaman DESC
");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Laporan Perpustakaan</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
  <h3>Laporan Perpustakaan</h3>
  <a href="../dashboard.php">Dashboard</a>
</div>

<div class="dashboard">

  <!-- Ringkasan -->
  <div class="menu-grid">

    <div class="menu-card">
      <h4>Total Peminjaman</h4>
      <strong><?= $total_peminjaman ?></strong>
    </div>

    <div class="menu-card">
      <h4>Total Pengembalian</h4>
      <strong><?= $total_pengembalian ?></strong>
    </div>

    <div class="menu-card">
      <h4>Total Denda</h4>
      <strong>Rp <?= number_format($total_denda,0,',','.') ?></strong>
    </div>

  </div>

  <!-- Tabel laporan -->
  <div class="card" style="margin-top:20px">
    <h3>Detail Laporan</h3>

    <table>
      <tr>
        <th>No</th>
        <th>Nama Anggota</th>
        <th>Tgl Pinjam</th>
        <th>Tgl Kembali</th>
        <th>Status</th>
        <th>Denda</th>
      </tr>

      <?php if(mysqli_num_rows($data)>0): $no=1; ?>
        <?php while($row=mysqli_fetch_assoc($data)): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row['nama'] ?></td>
          <td><?= $row['tanggal_pinjam'] ?></td>
          <td><?= $row['tanggal_kembali'] ?? '-' ?></td>
          <td><?= $row['status'] ?></td>
          <td>
            <?= $row['denda'] > 0 
                ? 'Rp '.number_format($row['denda'],0,',','.') 
                : '-' ?>
          </td>
        </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" style="text-align:center">
            Belum ada data laporan
          </td>
        </tr>
      <?php endif; ?>

    </table>
  </div>

</div>

</body>
</html>
