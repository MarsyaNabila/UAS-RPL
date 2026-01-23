<!DOCTYPE html>
<html>
<head>
  <title>Tambah Anggota</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
  <h3>Tambah Anggota</h3>
  <a href="index.php">Kembali</a>
</div>

<div class="card">
  <h2>Form Tambah Anggota</h2>

  <form action="proses_tambah.php" method="post">
    <label>Nama</label>
    <input type="text" name="nama" required>

    <label>Alamat</label>
    <input type="text" name="alamat" required>

    <label>No Telepon</label>
    <input type="text" name="no_telp" required>

    <button type="submit">Simpan</button>
  </form>
</div>

</body>
</html>
