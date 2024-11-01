<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $stmt = $pdo->prepare("INSERT INTO siswa (nama, kelas, jurusan) VALUES (?, ?, ?)");
    $stmt->execute([$nama, $kelas, $jurusan]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <h1>Tambah Siswa</h1>
    <form action="" method="POST">
        Nama: <input type="text" name="nama" required><br>
        Kelas: <input type="text" name="kelas" required><br>
        Jurusan: <input type="text" name="jurusan" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
