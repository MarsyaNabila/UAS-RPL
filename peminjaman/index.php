<?php
include "../config/koneksi.php";

/* ========================
   SEARCH & FILTER
======================== */
$search   = $_GET['search'] ?? '';
$tgl_awal = $_GET['tgl_awal'] ?? '';
$tgl_akhir= $_GET['tgl_akhir'] ?? '';

$query = "
  SELECT 
    p.id_peminjaman,
    a.nama,
    p.tanggal_pinjam,
    p.tanggal_kembali,
    p.status
  FROM peminjaman p
  JOIN anggota a ON p.id_anggota = a.id_anggota
  WHERE p.status = 'Dipinjam'
";

/* search nama */
if ($search != '') {
  $query .= " AND a.nama LIKE '%$search%'";
}

/* filter tanggal */
if ($tgl_awal != '' && $tgl_akhir != '') {
  $query .= " AND p.tanggal_pinjam BETWEEN '$tgl_awal' AND '$tgl_akhir'";
}

$query .= " ORDER BY p.id_peminjaman DESC";

$data = mysqli_query($conn, $query);

if (!$data) {
  die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Peminjaman</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
  <h3>Data Peminjaman</h3>
  <a href="../dashboard.php">Dashboard</a>
</div>

<div class="card">

  <a href="tambah.php" class="btn">+ Tambah Peminjaman</a>

  <!-- 🔍 SEARCH & FILTER -->
  <form method="get" style="margin:15px 0; display:flex; gap:10px; flex-wrap:wrap">
    <input type="text" name="search" placeholder="Cari nama anggota..."
           value="<?= $search ?>">

    <input type="date" name="tgl_awal" value="<?= $tgl_awal ?>">
    <input type="date" name="tgl_akhir" value="<?= $tgl_akhir ?>">

    <button type="submit" class="btn">Cari</button>
    <a href="index.php" class="btn" style="background:#777">Reset</a>
  </form>

  <!-- 📋 TABLE -->
  <table>
    <tr>
      <th>No</th>
      <th>Nama Anggota</th>
      <th>Tanggal Pinjam</th>
      <th>Tanggal Kembali</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>

    <?php if (mysqli_num_rows($data) > 0): $no=1; ?>
      <?php while ($row = mysqli_fetch_assoc($data)): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['tanggal_pinjam'] ?></td>
        <td><?= $row['tanggal_kembali'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
          <a href="kembali.php?id=<?= $row['id_peminjaman'] ?>"
             class="action-btn action-edit">
            Kembalikan
          </a>
        </td>
      </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td colspan="6" style="text-align:center">
          Belum ada data peminjaman
        </td>
      </tr>
    <?php endif; ?>
  </table>

</div>

</body>
</html>
