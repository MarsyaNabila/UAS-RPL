<?php
include "../config/koneksi.php";

$data = mysqli_query($conn, "
  SELECT 
    p.id_peminjaman,
    a.nama,
    p.tanggal_pinjam,
    p.tanggal_kembali,
    p.status,
    p.denda
  FROM peminjaman p
  JOIN anggota a ON p.id_anggota = a.id_anggota
  WHERE p.status = 'Dikembalikan'
  ORDER BY p.tanggal_kembali DESC
");

if (!$data) {
  die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Riwayat Pengembalian</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
  <h3>Riwayat Pengembalian Buku</h3>
  <a href="../dashboard.php">Dashboard</a>
</div>

<div class="card">
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
    <td><?= $row['tanggal_kembali'] ?></td>
    <td><?= $row['status'] ?></td>
    <td>Rp <?= number_format($row['denda'],0,',','.') ?></td>
  </tr>
  <?php endwhile; ?>
<?php else: ?>
  <tr>
    <td colspan="6" style="text-align:center">
      Belum ada data pengembalian
    </td>
  </tr>
<?php endif; ?>

</table>
</div>

</body>
</html>
