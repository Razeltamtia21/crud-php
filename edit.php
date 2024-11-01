<?php
include 'koneksi.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM siswa WHERE id = ?");
$stmt->execute([$id]);
$siswa = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $stmt = $pdo->prepare("UPDATE siswa SET nama = ?, kelas = ?, jurusan = ? WHERE id = ?");
    $stmt->execute([$nama, $kelas, $jurusan, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <h1>Edit Siswa</h1>
    <form action="" method="POST">
        Nama: <input type="text" name="nama" value="<?= $siswa['nama'] ?>" required><br>
        Kelas: <input type="text" name="kelas" value="<?= $siswa['kelas'] ?>" required><br>
        Jurusan: <input type="text" name="jurusan" value="<?= $siswa['jurusan'] ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>

<?php
include 'koneksi.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM siswa WHERE id = ?");
$stmt->execute([$id]);
$siswa = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $stmt = $pdo->prepare("UPDATE siswa SET nama = ?, kelas = ?, jurusan = ? WHERE id = ?");
    $stmt->execute([$nama, $kelas, $jurusan, $id]);

    header("Location: index.php");
    exit;
}
?>
