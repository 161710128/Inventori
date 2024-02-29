<?php
include 'koneksi.php'; // Sertakan file koneksi yang telah Anda buat sebelumnya

$query = "SELECT * FROM tbl_server";
$result = mysqli_query($koneksi, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>