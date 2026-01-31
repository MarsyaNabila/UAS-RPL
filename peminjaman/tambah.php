<?php
include "../config/koneksi.php";

// ambil data anggota
$anggota = mysqli_query($conn, "SELECT * FROM anggota ORDER BY nama ASC");

// ambil data buku (stok tersedia)
$buku = mysqli_query($conn, "SELECT * FROM buku WHERE stok > 0 ORDER BY judul ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Peminjaman</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
    /* khusus dropdown biar sama kaya input */
    select {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #cccccc;
      border-radius: 6px;
      font-size: 14px;
    }

    select:focus {
      border-color: #b71c1c;
      outline: none;
    }
  </style>
</head>
<body>

<div class="navbar">
  <h3>Tambah Peminjaman</h3>
  <a href="index.php">Kembali</a>
</div>

<div class="card">
  <h2>Form Peminjaman Buku</h2>

  <form action="proses_tambah.php" method="post">

    <label>Nama Anggota</label>
    <select name="id_anggota" required>
      <option value="">-- Pilih Anggota --</option>
      <?php while($a = mysqli_fetch_assoc($anggota)): ?>
        <option value="<?= $a['id_anggota']; ?>">
          <?= $a['nama']; ?>
        </option>
      <?php endwhile; ?>
    </select>

    <label>Judul Buku</label>
    <select name="id_buku" required>
      <option value="">-- Pilih Buku --</option>
      <?php while($b = mysqli_fetch_assoc($buku)): ?>
        <option value="<?= $b['id_buku']; ?>">
          <?= $b['judul']; ?> (Stok: <?= $b['stok']; ?>)
        </option>
      <?php endwhile; ?>
    </select>

    <label>Tanggal Pinjam</label>
    <input type="date" name="tanggal_pinjam" required>

    <label>Tanggal Kembali</label>
    <input type="date" name="tanggal_kembali" required>

    <button type="submit">Simpan Peminjaman</button>

  </form>
</div>

</body>
</html>
