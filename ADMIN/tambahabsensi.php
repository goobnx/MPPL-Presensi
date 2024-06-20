<?php

include ("koneksi.php");

session_start();

if (!isset($_SESSION["nama"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABSENSI</title>
    <link rel="stylesheet" href="../CSS/styletambahabsensi.css">
    <link rel="icon" href="../ASET/logo skaga.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.1/css/boxicons.min.css">
    <style>
        /* Import font Inter from Google Fonts */
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap");

        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", sans-serif;
            /* Menggunakan font Inter sebagai default */
        }

        /* Styling untuk link */
        a {
            color: #000;
            text-decoration: none;
            transition: all .3s ease-in-out;
        }

        /* Centering elements */
        .center {
            text-align: center !important;
        }

        /* Styling untuk kode pre */
        pre {
            overflow: auto;
            font-size: 1em;
        }

        /* Menghilangkan bullet point dari list */
        ul {
            list-style: none;
        }

        /* Styling untuk link dengan kelas "link" */
        a.link {
            text-decoration: none;
        }

        a.link:hover {
            text-decoration: underline;
        }

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
            z-index: 999;
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
            z-index: 1;
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
            z-index: 2;
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

        .container4 {
            margin: auto;
            display: flex;
            align-items: center;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            margin-left: 3%;
        }

        .all {
            width: 90%;
            display: flex;
        }

        .all .container4 {
            width: 100%;
            display: flex;
            border-radius: 30px;
        }

        .container4 .card-1 {
            display: flex;
            align-items: center;
            padding: 0;
        }

        .card-1 img {
            padding: 10px;
            width: 200px;
            border-radius: 25px;
        }

        .container4 .card-2 {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            row-gap: 10px;
            padding: 20px;
            flex: 1;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .card-2 h2 {
            font-size: 16px;
            margin: 0;
            padding: 0;
        }

        .card-2 .boxx {
            /* display: flex; */
            flex-direction: column;
            width: 100%;
            margin-top: 20px;
        }

        .box .desc-1 {
            display: flex;
            flex-direction: column;
        }

        .button-container {
            display: flex;
        }

        .btn4 {
            flex: 1;
            text-align: center;
            padding: 0.6rem 1rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 5px;
            border: 0px;
            margin-top: -10%;
            background-color: #0085a6;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn4:hover {
            background-color: #00657e;
        }

        .btn5 {
            background-color: #2b72fb;
            color: var(--white);
            border-radius: 15px;
            width: 30%;
            padding: 10px;
            text-align: center;
            margin-left: 100vh;
            margin-bottom: 3vh;
        }

        .btn5 button {
            font-size: 1rem;
            font-weight: bold;
        }

        .btn5:hover {
            background-color: #245cc7;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group label {
            width: 120px;
            margin-right: 10px;
            font-weight: bold;
        }

        .form-group input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .close:focus {
            outline: none;
        }

        .container.justify-content-center {
            margin-top: 200px;
        }

        .modal-header {
            border: none;
        }

        .modal-footer {
            border: none;
        }

        .btn-danger {
            background: #DD2750;
            border: 1px solid #C43352;
        }

        .btn-light {
            border: 1px solid #E7E7E9;
        }

        .btn:focus {
            box-shadow: none;
        }

        .modal3 {
            display: none;
            position: fixed;
            z-index: 9;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content3 {
            background-color: #fefefe;
            margin: 15% auto;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
            padding: 50px;
        }

        .close3 {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close3:hover,
        .close3:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .btn8,
        .btn9 {
            padding: 10px 20px;
            border: none;
            background-color: red;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            float: right;
        }

        .btn8 {
            margin-right: 1vh;
        }

        .btn9 {
            background-color: #4CAF50;
        }

        .btn8:hover {
            background-color: #B31312;
        }

        .btn9:hover {
            background-color: #45a049;
        }
    </style>
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
                        <button class="nav-link dropdown-btn" data-dropdown="dropdown2" aria-haspopup="true"
                            aria-expanded="false" aria-label="discover">Absensi<i class="bx bx-chevron-down"
                                aria-hidden="true"></i>
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
                    <a href="#" button type="submit" class="btn btn-primary"
                        onclick="confirmLogout()">Keluar</a>
                </div>
                <button id="hamburger" aria-label="hamburger" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-menu" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </header>

    <button class="btn1" id="myBtn1">Tambah Siswa</button>

    <!-- Modal Tambah Siswa -->
    <div id="myModal1" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-content newspaper">
                <div class="container">
                    <h2 align="center">TAMBAH DATA SISWA</h2><br>
                    <form method="post" action="../FUNGSI/tambah_siswa.php" enctype="multipart/form-data"
                        class="card-2">
                        <div class="form-group">
                            <label>Foto</label><input type="file" name="gambar" id="gambar">
                        </div>
                        <div class="form-group">
                            <label>Nomor Absen</label><input type="number" name="absen"
                                placeholder="Masukkan Nomor Absen">
                        </div>
                        <div class="form-group">
                            <label>Nama</label><input type="text" name="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label>NIPD</label><input type="text" name="nipd" placeholder="Masukkan NIPD">
                        </div>
                        <div class="boxx">
                            <button type="submit" name="tambah" class="btn2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form method="post" class="absensi" id="attendanceForm">

        <?php

        $sql = mysqli_query($koneksi, "SELECT * FROM siswa");

        $no = 0;
        while ($row = mysqli_fetch_array($sql)) {
            $no++;

            $nama = $row['nama'];
            $no_absen = $row['no_absen'];
            $nipd = $row['nipd'];
            $foto = $row['foto'];
            $id_siswa = $row['id'];

            ?>

            <div class="all">
                <div class="container-card">
                    <div class="card-1">
                        <div class="photo">
                            <img src="../ASET/Foto Siswa/<?= $foto ?>" alt="Foto Siswa">
                        </div>
                    </div>
                    <div class="card-2">
                        <div class="text">
                            <h1><?= $no_absen ?></h1>
                            <h2><?= $nama ?></h2>
                            <h2><?= $nipd ?></h2>
                        </div>
                        <div class="boxx">
                            <div class="box">
                                <div class="desc-1">
                                    <h3>Hadir</h3>
                                    <h1>
                                        <input type="radio" id="hadir_<?= $id_siswa ?>" name="absensi<?= $id_siswa ?>" value="hadir">
                                    </h1>
                                </div>
                                <div class="desc-1">
                                    <h3>Sakit</h3>
                                    <h1>
                                        <input type="radio" id="sakit_<?= $id_siswa ?>" name="absensi<?= $id_siswa ?>" value="sakit">
                                    </h1>
                                </div>
                                <div class="desc-1">
                                    <h3>Izin</h3>
                                    <h1>
                                        <input type="radio" id="izin_<?= $id_siswa ?>" name="absensi<?= $id_siswa ?>" value="izin">
                                    </h1>
                                </div>
                                <div class="desc-1">
                                    <h3>Alpha</h3>
                                    <h1>
                                        <input type="radio" id="alpha_<?= $id_siswa ?>" name="absensi<?= $id_siswa ?>" value="alpha">
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>

        <div class="btn5">
            <button type="submit" name="absen" onclick="return validateForm()">SIMPAN DATA</button>
        </div>
    </form>

    <?php

    // Mengatur zona waktu ke Waktu Indonesia Barat (WIB)
    date_default_timezone_set('Asia/Jakarta');

    // Mendapatkan tanggal saat ini dalam format Y-m-d
    $today = date('Y-m-d');
    $query = mysqli_query($koneksi, "SELECT * FROM absensi WHERE tanggal='$today'");

    if (mysqli_num_rows($query) > 0) {
        echo "
            <script>alert('Hari ini Sudah Absen!')</script>
        ";
    } else {
        if (isset($_POST['absen'])) {
            // Loop melalui data absensi untuk setiap siswa
            foreach ($_POST as $key => $value) {
                // Pastikan key yang diterima adalah untuk absensi siswa
                if (substr($key, 0, 7) === 'absensi') {
                    // Ambil id siswa dari key
                    $siswa_id = substr($key, 7);
    
                    // Ambil status absensi dari value
                    $status_absen = $_POST[$key];
    
                    // Lakukan validasi data jika diperlukan
        
                    // Lakukan penyimpanan data absensi ke database
                    $tanggal_absen = date('Y-m-d'); // Tanggal absen dapat diambil dari form atau di-generate di sini
                    $periode = date('Y-m');
                    $query = "INSERT INTO absensi (id_siswa, kehadiran, tanggal, periode) VALUES ('$siswa_id', '$status_absen', '$tanggal_absen', '$periode')";
                    $result = mysqli_query($koneksi, $query);
    
                    // Periksa jika query berhasil atau tidak
                    if (!$result) {
                        // Proses jika query gagal
                        echo "Gagal menyimpan data absensi untuk siswa dengan ID: $siswa_id";
                    }
                }
            }
        }
    }


    ?>

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
    <script>
    function validateForm() {
        const form = document.getElementById('attendanceForm');
        const inputs = form.querySelectorAll('input[type="radio"]');
        const ids = new Set();

        // Collect all student IDs
        inputs.forEach(input => ids.add(input.name));

        // Check if each student has an attendance mark
        for (const id of ids) {
            const radios = form.querySelectorAll(`input[name="${id}"]`);
            if (![...radios].some(radio => radio.checked)) {
                alert('Mohon Lengkapi Seluruh Data Kehadiran Siswa');
                return false;
            }
        }

        return true;
    }
    </script>
    <script>
        // Fungsi untuk menampilkan modal dan mencegah pengiriman form
        function showDeleteModal(id) {
            document.getElementById('deleteModal3').style.display = 'block';
            return false; // Mencegah pengiriman form secara otomatis
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('deleteModal3').style.display = 'none';
        }

    </script>


    <!-- Modal Konfirmasi Penghapusan -->
    <div id="deleteModal3" class="modal3">
        <div class="modal-content3">
            <span class="close3" onclick="closeModal()">&times;</span>
            <h2>Hapus Biodata Siswa</h2><br>
            <p>Apakah Anda yakin ingin menghapus biodata siswa ini?</p><br>
            <button onclick="closeModal()" class="btn9">Batal</button>
            <button id="confirmDelete3" class="btn8" onclick="confirmDelete()">Hapus</button>
        </div>
    </div>
</body>
</html>