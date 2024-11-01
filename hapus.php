<?php
include 'koneksi.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM siswa WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>