<?php
$hostname = 'localhost';
$username = 'gerlinki_ridwan';
$password = 'Ridw@n13';
$database = 'gerlinki_control_server';

$koneksi = mysqli_connect($hostname, $username, $password, $database);
if (!$koneksi) {
    die('Koneksi ke database gagal: ' . mysqli_connect_error());
}
?>
