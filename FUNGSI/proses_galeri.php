<?php

include("../ADMIN/koneksi.php");

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];

    $targetDir = "../ASET/galeri/";
    $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
    
    // Cek apakah file gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if($check === false) {
        echo "
            <script>alert('File bukan gambar.')</script>
        ";
        exit();
    }

    // Cek jika file sudah ada
    if (file_exists($targetFile)) {
        echo "
            <script>alert('Maaf, file sudah ada.')</script>
        ";
        exit();
    }

    // Izinkan hanya format gambar tertentu
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $allowedTypes)) {
        echo "Maaf, hanya format JPG, JPEG, PNG & GIF yang diperbolehkan.";
        exit();
    }

    // Pindahkan file ke folder aset
    if (!move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
        echo "Maaf, terdapat error saat mengunggah file.";
        exit();
    }

    // // Pindahkan file ke folder aset
    // if (!move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
    //     echo "
    //     <script>alert('Maaf, file sudah ada.')</script> 
    //     ";
    //     exit();
    // }

    // Simpan informasi gambar ke database
    $namaGambar = $_FILES["gambar"]["name"];

    $sql = mysqli_query($koneksi, "INSERT INTO galeri(judul, tanggal, foto) VALUES('$judul', '$tanggal', '$namaGambar')");

    echo "
        <script>
            alert('Data galeri berhasil ditambahkan');
        </script> 
    ";

    header("Location: ../ADMIN/galeri.php");
}

?>