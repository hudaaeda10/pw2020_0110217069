<?php
require 'functions.php';

if (isset($_POST['daftar'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('Registrasi Berhasil Silahkan Loigin!');
        document.location.href='login.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Sistem</title>
</head>

<body>
    <h3>Registrasi Website</h3>

    <form action="" method="POST">
        <ul>
            <li>
                <label>
                    Username :
                    <input type="text" name="username" autocomplete="off" autofocus required>
                </label>
            </li>
            <li>
                <label>
                    Password :
                    <input type="password" name="password1" required>
                </label>
            </li>
            <li>
                <label>
                    Konfirmasi Password :
                    <input type="password" name="password2">
                </label>
            </li>
            <li>
                <button type="submit" name="daftar">Daftar! </button>
            </li>
        </ul>
    </form>
</body>

</html>