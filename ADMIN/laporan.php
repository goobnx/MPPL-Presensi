<?php

include "koneksi.php";

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Get the selected period from the request
$periode = isset($_GET['periode']) ? $_GET['periode'] : date('Y-m');

// Fetch attendance data
$sql = "
    SELECT 
        siswa.no_absen,
        siswa.nama,
        SUM(CASE WHEN absensi.kehadiran = 'hadir' THEN 1 ELSE 0 END) AS hadir_count,
        SUM(CASE WHEN absensi.kehadiran = 'izin' THEN 1 ELSE 0 END) AS izin_count,
        SUM(CASE WHEN absensi.kehadiran = 'sakit' THEN 1 ELSE 0 END) AS sakit_count,
        SUM(CASE WHEN absensi.kehadiran = 'alpha' THEN 1 ELSE 0 END) AS alpha_count
    FROM absensi
    JOIN siswa ON absensi.id_siswa = siswa.id
    WHERE absensi.periode = '$periode'
    GROUP BY siswa.no_absen, siswa.nama
    ORDER BY CAST(siswa.no_absen AS UNSIGNED)";

$result = $koneksi->query($sql);

// Output as an HTML table
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan Kehadiran Siswa $periode.xls");

echo "<table border='1'>";
echo "<b>Absensi Periode $periode</b>";
echo "<tr>
        <th>No. Absen</th>
        <th>Nama</th>
        <th>Hadir</th>
        <th>Izin</th>
        <th>Sakit</th>
        <th>Alpha</th>
      </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['no_absen']}</td>
            <td>{$row['nama']}</td>
            <td>{$row['hadir_count']}</td>
            <td>{$row['izin_count']}</td>
            <td>{$row['sakit_count']}</td>
            <td>{$row['alpha_count']}</td>
          </tr>";
}

echo "</table>";

$koneksi->close();
?>
