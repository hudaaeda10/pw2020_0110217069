<?php
// koneksi database
function koneksi()
{
    return mysqli_connect('localhost', 'root', '', 'pw_0110217069');
}

function query($query)
{
    $conn = koneksi();

    $result = mysqli_query($conn, $query);
    // menampilkan satu data saja
    if (mysqli_num_rows($result) ==  1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    $conn = koneksi();

    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);


    $query = "INSERT INTO mahasiswa VALUES (null, '$nrp', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    $conn = koneksi();

    $id = $data['id'];
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);


    $query = "UPDATE mahasiswa SET 
                    nrp = '$nrp',
                    nama = '$nama',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                    WHERE id = $id
                ";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $conn = koneksi();
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR
                    nrp LIKE '%$keyword%'";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function login($data)
{
    $conn = koneksi();
    // ambil data post dari inputan
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    // periksa data username 
    if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
        // cek password
        if (password_verify($password, $user['password'])) {
            // set sessionnya
            $_SESSION['login'] = true;

            header("Location: index.php");
            exit;
        }
    }
    return [
        'error' => true,
        'pesan' => 'Username / Password Salah!'
    ];
}

function registrasi($data)
{
    $conn = koneksi();

    // masukkan data post ke dalam variabel
    $username = htmlspecialchars($data['username']);
    $password1 = mysqli_real_escape_string($conn, $data['password1']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // jika username dan password kosong
    if (empty($username) || empty($password1) || empty($password2)) {
        echo "<script>
                alert('Username dan Password tidak boleh kosong!');
                </script>";
        return false;
    }

    // jika username sudah ada yang terdaftar di table user
    if (query("SELECT * FROM user WHERE username = '$username'")) {
        echo "<script>
                alert('Username sudah terdaftar!');
                </script>";
        return false;
    }

    //  konfirmasi password tidak sesuai
    if ($password1 !== $password2) {
        echo "<script>
        alert('Konfirmasi Password gagal atau salah!');
        </script>";
        return false;
    }

    // password tidak boleh kurang dari 5 digit
    if ($password1 < 5) {
        echo "<script>
        alert('Password tidak boleh kurang dari 5 huruf!');
        </script>";
        return false;
    }

    // jika sudah memenuhi semua kritreria
    // enkripsi password
    $password_baru = password_hash($password1, PASSWORD_DEFAULT);

    // insert ke dalam tabel user
    $query = "INSERT INTO user VALUES
                    (null, '$username', '$password_baru')
                    ";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
