<?php

session_start();
include("../ADMIN/koneksi.php");

// Login
if (isset($_POST['login'])) {
    // Inisialisasi variabel
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Melakukan query untuk memeriksa username dan password
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $hitung = mysqli_num_rows($cek);

    if ($hitung > 0) {
        // Ambil data pengguna
        $data = mysqli_fetch_assoc($cek);

        // Simpan data pengguna dalam session
        $_SESSION['login'] = 'True';
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $data['nama']; // Asumsikan kolom 'nama' ada dalam tabel 'users'

        // Tampilkan pesan selamat datang
        echo '<script>
                alert("Selamat datang ' . $data['nama'] . ' di Dashboard Admin !");
                location.href="../ADMIN/index.php";
              </script>';
    } else {
        // Jika data tidak ditemukan, maka gagal login
        echo '<script>
                alert("Username atau Password salah!");
                location.href="../ADMIN/login.php";
              </script>';
    }
}

?>
