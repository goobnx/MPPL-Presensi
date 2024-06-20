<?php

include ("../ADMIN/koneksi.php");

$hadir_result = mysqli_query($koneksi, "SELECT COUNT(*) as count FROM absensi WHERE kehadiran='hadir'");
$hadir_row = mysqli_fetch_assoc($hadir_result);
$hadir_count = $hadir_row['count'];
$sakit_result = mysqli_query($koneksi, "SELECT COUNT(*) as count FROM absensi WHERE kehadiran='sakit'");
$sakit_row = mysqli_fetch_assoc($sakit_result);
$sakit_count = $sakit_row['count'];
$izin_result = mysqli_query($koneksi, "SELECT COUNT(*) as count FROM absensi WHERE kehadiran='izin'");
$izin_row = mysqli_fetch_assoc($izin_result);
$izin_count = $izin_row['count'];
$alpha_result = mysqli_query($koneksi, "SELECT COUNT(*) as count FROM absensi WHERE kehadiran='alpha'");
$alpha_row = mysqli_fetch_assoc($alpha_result);
$alpha_count = $alpha_row['count'];

$select_periode = mysqli_query($koneksi, "SELECT * FROM absensi LIMIT 1");
$row = mysqli_fetch_assoc($select_periode);

if ($row) {
    // Tanggal dalam format 'YYYY-MM'
    $date_str = $row['periode'];

    // Ubah string tanggal menjadi objek DateTime
    $date_obj = new DateTime($date_str);

    // Ambil nama bulan dari objek DateTime
    $nama_bulan = $date_obj->format('F');
} else {
    // Default value if no records are found
    $nama_bulan = 'N/A';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIHAT ABSENSI</title>
    <link rel="stylesheet" href="../CSS/stylelihatabsensi.css">
    <link rel="stylesheet" href="../CSS/styleranking.css">
    <link rel="icon" href="../ASET/logo skaga.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <center>
        <canvas id="myChart" style="width:100%;max-width:150vh"></canvas>
    </center>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        function confirmLogout() {
            var result = confirm("Apakah Anda yakin ingin logout?");
            if (result) {
                window.location.href = "../FUNGSI/proses_logout.php";
            }
        }
    </script>
    <script>
        <?php
        // Mengambil nilai dari query PHP dan mengubahnya ke variabel JavaScript
        echo "const hadirCount = $hadir_count;\n";
        echo "const sakitCount = $sakit_count;\n";
        echo "const izinCount = $izin_count;\n";
        echo "const alphaCount = $alpha_count;\n";
        echo "const bulan = '$nama_bulan';\n";
        ?>

        const xValues = ["Hadir", "Sakit", "Izin", "Alpha"];
        const yValues = [hadirCount, sakitCount, izinCount, alphaCount];
        const barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9"
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {

                    display: true,
                    text: `Persentase Kehadiran Periode ${bulan}`
                }
            }
        });
    </script>
</body>
</html>