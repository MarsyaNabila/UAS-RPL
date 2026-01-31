<?php
session_start();
include "config/koneksi.php";

// hitung data
$anggota = mysqli_fetch_assoc(mysqli_query($conn,"
  SELECT COUNT(*) total FROM anggota
"));

$buku = mysqli_fetch_assoc(mysqli_query($conn,"
  SELECT COUNT(*) total FROM buku
"));

$dipinjam = mysqli_fetch_assoc(mysqli_query($conn,"
  SELECT COUNT(*) total FROM peminjaman WHERE status='Dipinjam'
"));

$dikembalikan = mysqli_fetch_assoc(mysqli_query($conn,"
  SELECT COUNT(*) total FROM peminjaman WHERE status='Dikembalikan'
"));

$denda = mysqli_fetch_assoc(mysqli_query($conn,"
  SELECT IFNULL(SUM(denda),0) total FROM peminjaman
"));

// data grafik
$grafik = mysqli_query($conn,"
  SELECT judul, stok FROM buku
");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/dashboard.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="navbar">
  <h3>Sistem Informasi Perpustakaan</h3>
  <a href="auth/logout.php">Logout</a>
</div>

<div class="dashboard">

  <div class="dashboard-header">
    <h2>Dashboard Admin</h2>
    <p>Kelola data perpustakaan</p>
  </div>

  <div class="menu-grid">

    <a href="anggota/index.php" class="menu-card">
      <div class="icon">👥</div>
      <h4>Data Anggota</h4>
      <span class="stat-number"><?= $anggota['total']; ?></span>
      <p>Jumlah anggota terdaftar</p>
    </a>

    <a href="buku/index.php" class="menu-card">
      <div class="icon">📚</div>
      <h4>Data Buku</h4>
      <span class="stat-number"><?= $buku['total']; ?></span>
      <p>Koleksi buku perpustakaan</p>
    </a>

    <a href="peminjaman/index.php" class="menu-card">
      <div class="icon">🔄</div>
      <h4>Peminjaman</h4>
      <span class="stat-number"><?= $dipinjam['total']; ?></span>
      <p>Buku yang sedang dipinjam</p>
    </a>

    <a href="pengembalian/index.php" class="menu-card">
      <div class="icon">↩️</div>
      <h4>Pengembalian</h4>
      <span class="stat-number"><?= $dikembalikan['total']; ?></span>
      <p>Riwayat pengembalian</p>
    </a>

    <a href="laporan/index.php" class="menu-card">
      <div class="icon">📊</div>
      <h4>Laporan</h4>
      <p>Laporan peminjaman & denda</p>
    </a>

  </div>

  

  

