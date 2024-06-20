<?php

include ("koneksi.php");

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BERANDA</title>
    <link rel="stylesheet" href="../CSS/styleindex.css">
    <link rel="icon" href="../ASET/logo skaga.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.1/css/boxicons.min.css">
</head>
<body>
    <header id="nav-menu" aria-label="navigation bar">

        <div class="container2">
            <div class="nav-start">
                <a class="logo" href="#">
                    <img src="../ASET/logo.png" width="75%" alt="Logo Skaga" />
                </a>
                <nav class="menu">
                    <ul class="menu-bar">
                        <li><a class="nav-link" href="index.php">Beranda</a></li>
                        <button class="nav-link dropdown-btn" data-dropdown="dropdown2" aria-haspopup="true" aria-expanded="false" aria-label="discover">Absensi<i class="bx bx-chevron-down" aria-hidden="true"></i>
                        </button>
                        <div id="dropdown2" class="dropdown">
                            <ul role="menu">
                                <li>
                                    <span class="dropdown-link-title">Absensi Siswa</span>
                                </li>
                                <li role="menuitem">
                                    <a class="dropdown-link" href="tambahabsensi.php">Tambah Data</a>
                                </li>
                                <li role="menuitem">
                                    <a class="dropdown-link" href="lihatabsensi.php">Lihat Data</a>
                                </li>
                            </ul>
                        </div>
                    </li>
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

                <a href="#" button type="submit" class="btn btn-primary" onclick="confirmLogout()">Keluar</button></a>

            </div>
            <button id="hamburger" aria-label="hamburger" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-menu" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</header>
    <img src="../ASET/banner.png" width="100%">
    <div class="artikel">
        <div class="card">
            <img src="../ASET/ppdb2024.png" alt="Card Image">
            <div class="card-description">
                <h2>PPDB SMK Negeri 3 Jember 2024</h2><br>
                <table border="1" cellspacing="0" cellpadding="1">
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                    </tr>
                    <tr align="center">
                        <td>1</td>
                        <td>Entry Nilai Rapor Oleh Kepala Sekolah SMP/Sederajat</td>
                        <td>20 - 25 Mei 2024</td>
                    </tr>
                    <tr align="center">
                        <td></td>
                        <td>Verifikasi Nilai Rapor Oleh Calon Peserta Didik Baru</td>
                        <td>24 - 28 Mei 2024</td>
                    </tr>
                    <tr align="center">
                        <td></td>
                        <td>Pembetulan Nilai Rapor oleh Kepala Sekolah SMP/Sederajat</td>
                        <td>27 - 30 Mei 2024</td>
                    </tr>
                    <tr align="center">
                        <td>2</td>
                        <td>Pengambilan PIN oleh Calon Peserta Didik Baru</td>
                        <td>27 Mei - 14 Juni 2024</td>
                    </tr>
                    <tr align="center">
                        <td></td>
                        <td>Verifikasi dan Validasi Dokumen oleh Operator SMA/SMK</td>
                        <td>28 Mei - 15 Juni 2024</td>
                    </tr>
                    <tr align="center">
                        <td>3</td>
                        <td>Latihan Pendaftaran</td>
                        <td>5 - 8 Juni 2024</td>
                    </tr>
                    <tr align="center">
                        <td>4</td>
                        <td>Tes Kesehatan untuk Syarat Pendaftaran SMK Negeri pada Konsentrasi Keahlian tertentu</td>
                        <td>28 Mei - 15 Juni 2024</td>
                    </tr>
                    </table>
            </div>
        </div>
    </div>
    <div class="artikel">
        <div class="card">
            <img src="../ASET/slider3.jpg" alt="Card Image">
            <div class="card-description">
                <h2>LKS Kabupaten Jember 2024</h2>
                <p>Lomba Kompetensi Siswa (LKS) SMK adalah sebuah kompetisi yang diselenggarakan untuk siswa-siswa Sekolah Menengah Kejuruan (SMK) di Indonesia. Tujuan utama dari LKS SMK adalah untuk mengukur dan meningkatkan kompetensi serta keterampilan para siswa dalam berbagai bidang keahlian yang mereka pelajari di sekolah.
                </p>
            </div>
        </div>
    </div>
    <div class="artikel">
        <div class="card">
            <img src="../ASET/slider1.jpg" alt="Card Image">
            <div class="card-description">
                <h2>Pemilihan Umum Serentak 2024</h2>
                <p>Pemilu Serentak 2024 di Indonesia adalah perhelatan demokrasi yang besar, di mana pemilihan umum untuk  memilih anggota legislatif (DPR, DPD, dan DPRD) serta pemilihan presiden dan wakil presiden dilakukan secara bersamaan. Pemilu ini merupakan bagian dari sistem demokrasi yang bertujuan untuk memilih wakil rakyat dan pemimpin nasional secara langsung oleh rakyat Indonesia. 
                </p>
            </div>
        </div>
    </div>
    <footer class="footer" id="kontak">
        <div class="container">
         <div class="row">
            <div class="footer-col">
             <h4>Lokasi Kami</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3949.5015671192473!2d113.7005064!3d-8.1521138!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd694454afd4331%3A0x9fbe01885f9ca437!2sSMK%20Negeri%203%20Jember!5e0!3m2!1sid!2sid!4v1709869045670!5m2!1sid!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
           <div class="footer-col">
             <h4>Kontak</h4>
             <img src="../ASET/logo.png">
             <ul class="footer-menu">
                <li>
                    <div class="icon-link">
                        <label><i class="fa fa-envelope" style="color: #fff;"></i></label>
                        <a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=smktigajember@gmail.com" target="_blank">smktigajember@gmail.com</a>
                    </div>
                </li>
                <li>
                    <div class="icon-link">
                        <label><i class="fa fa-phone" style="color: #fff;"></i></label><a href="#">0331-488069</a>
                    </div>
                </li>
                <li>
                    <div class="icon-link">
                        <label><i class="fa fa-map" style="color: #fff;"></i></label>
                        <a href="https://maps.app.goo.gl/5kakpvMfRjx5vTr89"
                        target="_blank">Jl. dr. Soebandi No. 31</a>
                    </div>
                </li>
            </ul>
           </div>
           <div class="footer-col">
             <h4>Ikuti Kami</h4>
             <div class="social-links">
               <a href="https://facebook.com/smktigajember/" target="_blank"><i class="fab fa-facebook-f"></i></a>
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
