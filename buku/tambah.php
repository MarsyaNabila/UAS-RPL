<!DOCTYPE html>
<html>
<head>
  <title>Tambah Buku</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
  <h3>Tambah Buku</h3>
  <a href="index.php">Kembali</a>
</div>

<div class="card">
  <h2>Form Tambah Buku</h2>

  <form action="proses_tambah.php" method="post" enctype="multipart/form-data">

    <label>Judul Buku</label>
    <input type="text" name="judul" required>

    <label>Pengarang</label>
    <input type="text" name="pengarang" required>

    <label>Penerbit</label>
    <input type="text" name="penerbit" required>

    <label>Tahun Terbit</label>
    <input type="number" name="tahun_terbit" required>

    <label>Stok</label>
    <input type="number" name="stok" required>

    <label>Cover Buku</label>
    <input type="file" name="gambar" accept="image/*" required>

    <button type="submit">Simpan</button>

  </form>
</div>

</body>
</html>
