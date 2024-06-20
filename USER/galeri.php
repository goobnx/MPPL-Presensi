<?php

include ("../ADMIN/koneksi.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GALERI</title>
    <link rel="stylesheet" href="../CSS/stylegaleri.css">
    <link rel="icon" href="../ASET/logo skaga.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.1/css/boxicons.min.css">
    <style>
        /* Styling untuk modal */
        [data-ml-modal] {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            overflow-x: hidden;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            width: 0;
            height: 0;
            opacity: 0;
        }

        [data-ml-modal]:target {
            width: auto;
            height: auto;
            opacity: 1;
            transition: opacity 1s ease;
        }

        [data-ml-modal]:target .modal-overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.7);
        }

        /* Styling untuk modal */
        [data-ml-modal] .modal-dialog {
            /* Shadow effect */
            box-shadow: 0 11px 15px -7px rgba(0, 0, 0, 0.2),
                0 24px 38px 3px rgba(0, 0, 0, 0.14),
                0 9px 46px 8px rgba(0, 0, 0, 0.12);
            position: relative;
            width: 100%;
            max-width: 660px;
            max-height: 70%;
            margin: 10% auto;
            /* Centering the modal vertically and horizontally */
            overflow-x: hidden;
            overflow-y: auto;
        }

        /* Styling untuk modal dengan ukuran besar */
        .modal-dialog-lg {
            max-width: 820px !important;
        }

        /* Styling untuk judul modal */
        [data-ml-modal] .modal-dialog>h3 {
            background-color: #eee;
            border-bottom: 1px solid #b3b3b3;
            font-size: 24px;
            font-weight: 400;
            margin: 0;
            padding: 0.8em 56px .8em 27px;
        }

        /* Styling untuk konten modal */
        [data-ml-modal] .modal-content {
            background: #fff;
            padding: 23px 27px;
        }

        /* Styling untuk tombol close modal */
        [data-ml-modal] .modal-close {
            position: absolute;
            top: 13px;
            right: 13px;
            color: #0085a6;
            background-color: #fff;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            font-size: 30px;
            line-height: 37px;
            text-align: center;
            transition: all .3s ease-in-out;
        }

        [data-ml-modal] .modal-close:hover {
            background-color: #0085a6;
            color: #fff;
            cursor: pointer;
        }

        [data-ml-modal] p:first-child,
        [data-ml-modal] p:last-child {
            margin: 0;
        }

        @media (max-width: 767px) {
            [data-ml-modal] .modal-dialog {
                margin: 20% auto;
            }
        }

        .btn1 {
            background-color: orange;
            color: var(--white);
            text-align: center;
            padding: 0.6rem 1.4rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 5px;
            margin-top: 4vh;
            margin-right: 7vh;
        }

        .right-button {
            display: flex;
            justify-content: flex-end;
        }

        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", sans-serif;
        }

        :root {
            --dark-grey: #333333;
            --medium-grey: #636363;
            --light-grey: #eeeeee;
            --ash: #f4f4f4;
            --primary-color: #2b72fb;
            --white: white;
            --dark: #373349;
            --border: 1px solid var(--light-grey);
            --shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px, rgba(0, 0, 0, .2);
        }

        body {
            font-family: inherit;
            background-color: var(--white);
            color: var(--dark-grey);
            letter-spacing: -0.4px;
        }

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            border: none;
            background-color: transparent;
            cursor: pointer;
            color: inherit;
        }

        .btn {
            display: block;
            background-color: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 0.6rem 1.4rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 5px;
        }

        .icon {
            padding: 0.5rem;
            background-color: var(--light-grey);
            border-radius: 10px;
        }

        .logo {
            margin-right: 1.5rem;
        }

        #nav-menu {
            border-bottom: var(--border);
        }

        .container2 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            column-gap: 2rem;
            height: 90px;
            padding: 1.2rem 3rem;
        }

        .menu {
            position: relative;
            background: var(--white);
        }

        .menu-bar li:first-child .dropdown {
            flex-direction: initial;
            min-width: 480px;
        }

        .menu-bar li:first-child ul:nth-child(1) {
            border-right: var(--border);
        }

        .menu-bar li:nth-child(n + 2) ul:nth-child(1) {
            border-bottom: var(--border);
        }

        .menu-bar .dropdown-link-title {
            font-weight: 600;
        }

        .menu-bar .nav-link {
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: -0.6px;
            padding: 0.3rem;
            min-width: 60px;
            margin: 0 0.6rem;
        }

        .menu-bar .nav-link:hover,
        .dropdown-link:hover {
            color: var(--primary-color);
        }

        .nav-start,
        .nav-end,
        .menu-bar,
        .right-container,
        .right-container .search {
            display: flex;
            align-items: center;
        }

        .dropdown {
            display: flex;
            flex-direction: column;
            min-width: 230px;
            background-color: var(--white);
            border-radius: 10px;
            position: absolute;
            top: 36px;
            z-index: 1;
            visibility: hidden;
            opacity: 0;
            transform: scale(0.97) translateX(-5px);
            transition: 0.1s ease-in-out;
            box-shadow: var(--shadow);
        }

        .dropdown.active {
            visibility: visible;
            opacity: 1;
            transform: scale(1) translateX(5px);
        }

        .dropdown ul {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding: 1.2rem;
            font-size: 0.95rem;
        }

        .dropdown-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.15rem;
        }

        .dropdown-link {
            display: flex;
            gap: 0.5rem;
            padding: 0.5rem 0;
            border-radius: 7px;
            transition: 0.1s ease-in-out;
        }

        .dropdown-link p {
            font-size: 0.8rem;
            color: var(--medium-grey);
        }

        .right-container {
            display: flex;
            align-items: center;
            column-gap: 1rem;
        }

        .right-container .search {
            position: relative;
        }

        .right-container img {
            border-radius: 50%;
        }

        .search input {
            background-color: var(--ash);
            border: none;
            border-radius: 6px;
            padding: 0.7rem;
            padding-left: 2.4rem;
            font-size: 16px;
            width: 100%;
            border: var(--border);
        }

        .search .bx-search {
            position: absolute;
            left: 10px;
            top: 50%;
            font-size: 1.3rem;
            transform: translateY(-50%);
            opacity: 0.6;
        }

        #hamburger {
            display: none;
            padding: 0.1rem;
            margin-left: 1rem;
            font-size: 1.9rem;
        }



        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 50px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 70%;
            border-radius: 10px;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        @media (max-width: 1100px) {
            #hamburger {
                display: block;
            }

            .container2 {
                padding: 1.2rem;
            }

            .menu {
                display: none;
                position: absolute;
                top: 87px;
                left: 0;
                min-height: 100vh;
                width: 100vw;
            }

            .menu-bar li:first-child ul:nth-child(1) {
                border-right: none;
                border-bottom: var(--border);
            }

            .dropdown {
                display: none;
                min-width: 100%;
                border: none !important;
                border-radius: 5px;
                position: static;
                top: 0;
                left: 0;
                visibility: visible;
                opacity: 1;
                transform: none;
                box-shadow: none;
            }

            .menu.show,
            .dropdown.active {
                display: block;
            }

            .dropdown ul {
                padding-left: 0.3rem;
            }

            .menu-bar {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                row-gap: 1rem;
                padding: 1rem;
            }

            .menu-bar .nav-link {
                display: flex;
                justify-content: space-between;
                width: 100%;
                font-weight: 600;
                font-size: 1.2rem;
                margin: 0;
            }

            .menu-bar li:first-child .dropdown {
                min-width: 100%;
            }

            .menu-bar>li:not(:last-child) {
                padding-bottom: 0.5rem;
                border-bottom: var(--border);
            }
        }

        @media (max-width: 600px) {
            .right-container {
                display: none;
            }
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        ul {
            list-style: none;
        }

        .all {
            width: 90%;
            display: flex;
        }

        .all .container {
            width: 100%;
            display: flex;
            border-radius: 30px;
        }

        .container .card-1 {
            width: 100%;
            display: flex;
            align-items: center;
            padding: 0;
        }

        .card-1 img {
            padding: 10px;
            width: 200px;
            border-radius: 25px;
        }

        .container .card-2 {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            row-gap: 10px;
            padding: 20px;
        }

        .card-2 h2 {
            font-size: 16px;
            margin: 0;
            padding: 0;
        }

        .card-2 .boxx {
            display: flex;
            flex-direction: column;
            width: 70%;
        }

        .box {
            display: flex;
            justify-content: space-evenly;
            text-align: center;
            background-color: rgba(172, 172, 172, 0.329);
            padding: 20px;
            border-radius: 20px;
            width: 25vw;
        }

        .box .desc-1 {
            display: flex;
            flex-direction: column;
        }

        @media only screen and (max-width: 870px) {
            .all .container {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .container .card-1 {
                width: 100%;
                display: flex;
                align-items: center;
                padding: 0;
                margin-left: 20%;
                margin-top: 2%;
            }

            .container .card-1 .photo {
                width: 70%;
                padding: 20px;
            }

            .card-1 .photo img {
                width: 100%;
                border-radius: 20px;
                padding: 0;
            }

            .container .card-2 {
                margin-left: 7%;
                text-align: center;
                padding: 0;
            }

            .boxx .box {
                margin: 20px;
                margin-left: 1px;
                width: 140%;
            }

            .box .desc-1 {
                font-size: 14px;
            }
        }

        figure {
            display: flex;
            min-width: 14rem;
            max-height: 16rem;
            position: relative;
            border-radius: .35rem;
            box-shadow:
                rgb(40, 40, 40, 0.1) 0px 2px 3px,
                rgb(20, 20, 20, 0.2) 0px 5px 8px,
                rgb(0, 0, 0, 0.25) 0px 10px 12px;
            overflow: hidden;
            transition: transform var(--anim-time--med) ease;
            z-index: 0;
        }
        
    </style>
</head>

<body>


    <!-- Modal Tambah Siswa -->
    <div id="myModal1" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-content newspaper">
                <div class="container">
                    <h2 align="center">TAMBAH FOTO</h2><br>
                    <form method="post" action="../FUNGSI/proses_galeri.php" enctype="multipart/form-data"
                        class="card-2">
                        <div class="form-group">
                            <label>Foto</label><input type="file" name="gambar" id="gambar" required>
                        </div>
                        <div class="form-group">
                            <label>Judul</label><input type="text" name="judul" placeholder="Masukkan Judul" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label><input type="text" name="tanggal" placeholder="Masukkan Tanggal" required>
                        </div>
                        <div class="boxx">
                            <button type="submit" name="tambah" class="btn2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <header id="nav-menu" aria-label="navigation bar">
        <div class="container2">
            <div class="nav-start">
                <a class="logo" href="#">
                    <img src="../ASET/logo.png" width="75%" alt="Logo Skaga" />
                </a>
                <nav class="menu">
                    <ul class="menu-bar">
                        <li><a class="nav-link" href="index.php">Beranda</a></li>
                        <li><a class="nav-link" href="lihatabsensi.php">Lihat Absensi</a></li>
                        <li><a class="nav-link" href="galeri.php">Galeri</a></li>
                        <li><a class="nav-link" href="#kontak">Kontak</a></li>
                    </ul>
                </nav>
            </div>
            <div class="nav-end">
                <div class="right-container">
                    <form class="search" role="search">
                        <input type="search" name="search" placeholder="Cari" />
                        <i class="bx bx-search" aria-hidden="true"></i>
                    </form>

                    <a href="../ADMIN/login.php" class="btn btn-primary">Login</a>
                    
                </div>
                <button id="hamburger" aria-label="hamburger" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-menu" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </header>

    <main class="gallery gallery__content--flow">

        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM galeri");

        while ($row = mysqli_fetch_array($sql)) {

            $gambar = $row["foto"];
            $judul = $row["judul"];
            $tanggal = $row["tanggal"];
            ?>

            <figure>
                <img class="img1" src="../ASET/galeri/<?= $gambar ?>">
                <figcaption class="header__caption" role="presentation">
                    <h1 class="title title--primary"><?= $judul ?></h1>
                    <h2 class="title title--secondary"><?= $tanggal ?></h2>
                </figcaption>
            </figure>

            <?php
        }
        ?>

    </main>
    <footer class="footer" id="kontak">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Lokasi Kami</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3949.5015671192473!2d113.7005064!3d-8.1521138!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd694454afd4331%3A0x9fbe01885f9ca437!2sSMK%20Negeri%203%20Jember!5e0!3m2!1sid!2sid!4v1709869045670!5m2!1sid!2sid"
                        width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="footer-col">
                    <h4>Kontak</h4>
                    <img src="../ASET/logo.png">
                    <ul class="footer-menu">
                        <li>
                            <div class="icon-link">
                                <label><i class="fa fa-envelope" style="color: #fff;"></i></label>
                                <a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=smktigajember@gmail.com"
                                    target="_blank">smktigajember@gmail.com</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon-link">
                                <label><i class="fa fa-phone" style="color: #fff;"></i></label><a
                                    href="#">0331-488069</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon-link">
                                <label><i class="fa fa-map" style="color: #fff;"></i></label>
                                <a href="https://maps.app.goo.gl/5kakpvMfRjx5vTr89" target="_blank">Jl. dr. Soebandi No.
                                    31</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Ikuti Kami</h4>
                    <div class="social-links">
                        <a href="https://facebook.com/smktigajember/" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/smktigajember" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/smknegeri3jember" target="_blank">
                            <span class="iconify" data-icon="fa:instagram" width="19px"></span></a>
                        <a href="https://www.youtube.com/channel/UCRQ_6DKMY3JKZKCjmExULkA" target="_blank">
                            <span class="iconify" data-icon="fa-brands:youtube" width="20px"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="footer2">
        <div class="container">
            <div class="row">
                <div class="footer-col2">
                    <h4>© 2024 Copyright SiteCrafts SMK Negeri 3 Jember</h4>
                </div>
            </div>
        </div>
    </footer>
    <script src="../SCRIPT/script.js"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script>
        function confirmLogout() {
            var result = confirm("Apakah Anda yakin ingin logout?");
            if (result) {
                window.location.href = "../FUNGSI/proses_logout.php";
            }
        }
    </script>
</body>
</html>