<?php

$database = 'absensi_yardduring';
$hostname = 'kpv.h.filess.io';
$username = 'absensi_yardduring';
$password = 'bf0f8391aa12f5bd9dd84abdf90ce36ad54ae23e';

$koneksi = new mysqli($hostname, $username, $password, $database);

if ($koneksi->connect_error) {
    die(''. $koneksi->connect_error);
}


?>