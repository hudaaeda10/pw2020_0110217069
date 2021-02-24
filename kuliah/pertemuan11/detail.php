<?php
require 'functions.php';

// memastikan jika tidak ada id tidak bisa masuk
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>

<body>
    <h3>Detail Mahasiswa</h3>
    <ul>
        <li> <img src="img/<?= $mhs['gambar']; ?>" width="60"> </li>
        <li> <?= $mhs['nama']; ?></li>
        <li> <?= $mhs['nrp']; ?></li>
        <li> <?= $mhs['email']; ?></li>
        <li> <?= $mhs['jurusan']; ?></li>
        <li> <a href="ubah.php?id=<?= $mhs['id']; ?>">Ubah</a> | <a href="hapus.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Apakah anda yakin data dihapus?')">hapus</a> </li>

        <li> <a href="index.php"> Kembali Ke Daftar Mahasiswa </a></li>
    </ul>
</body>

</html>