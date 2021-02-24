<?php
require 'functions.php';

// cek apakah data suda di submit
if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo " <script>
                    alert('Data Berhasil dimasukkan');
                    document.location.href='index.php';
                </script>";
    } else {
        echo "Data Gagal Masuk";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>

<body>
    <h3>Tambah Data Mahasiswa</h3>
    <form action="" method="POST">
        <ul>
            <li>
                <label>
                    Nama :
                    <input type="text" name="nama" required>
                </label>
            </li>
            <li>
                <label>
                    NRP :
                    <input type="text" name="nrp" required>
                </label>
            </li>
            <li>
                <label>
                    Email :
                    <input type="text" name="email" required>
                </label>
            </li>
            <li>
                <label>
                    Jurusan :
                    <input type="text" name="jurusan" required>
                </label>
            </li>
            <li>
                <label>
                    Gambar :
                    <input type="text" name="gambar" required>
                </label>
            </li>
            <li>
                <button type="submit" name="tambah">Simpan!</button>
            </li>
        </ul>
    </form>
</body>

</html>