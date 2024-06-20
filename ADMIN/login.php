<?php

session_start();
include("koneksi.php");

// Cek apakah pengguna sudah login
if (isset($_SESSION['login']) && $_SESSION['login'] === 'True') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/stylelogin.css">
        <link rel="icon" href="../ASET/logo skaga.png">
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <title>MASUK</title>
    </head>
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="../ASET/logo skaga.png" alt="">
                </div>
                <div class="login__forms">
                    <form method="post" action="../FUNGSI/proses_login.php" class="login__registre" id="login-in">
                        <h1 class="login__title">Masuk sebagai Admin</h1>
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="username" placeholder="Nama Pengguna" class="login__input">
                        </div>
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" name="password" placeholder="Kata Sandi" class="login__input">
                        </div>
                        <button type="submit" name="login" class="login__button">Masuk</button>
                        <a href="../USER/index.php" class="login__button">Kembali ke Beranda</a>
                    </form>
                </div>
            </div>
        </div>
        <script src="../SCRIPT/scriptlogin.js"></script>
    </body>
</html>