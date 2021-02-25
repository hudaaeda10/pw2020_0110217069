<?php
require 'functions.php';

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

// memastikan jika tidak ada id tidak bisa masuk
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// mengambil id
$id = $_GET['id'];

if (hapus($id) > 0) {
    echo " <script>
                alert('Data Berhasil DiHapus');
                document.location.href='index.php';
            </script>";
} else {
    echo "Data Gagal Di Hapus";
}
