<?php
session_start();
include_once "../config/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, 
    "SELECT * FROM admin 
     WHERE username='$username' 
     AND password='$password'"
);

$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['admin'] = $data['username'];
    header("Location: ../dashboard.php");
    exit;
} else {
    echo "<script>
        alert('Username atau Password salah');
        window.location='login.php';
    </script>";
}
