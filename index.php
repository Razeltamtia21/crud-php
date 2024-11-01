<?php
include 'koneksi.php';

$stmt = $pdo->query("SELECT * FROM siswa");
$siswa = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Siswa</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Dibuat</th>
            <th>Diperbarui</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($siswa as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['kelas'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td><?= $row['updated_at'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="tambah.php" class="button">Tambah Siswa</a>
</body>
</html>

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
