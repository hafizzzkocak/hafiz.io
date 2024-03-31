<?php

require_once 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nama = $_POST['Nama'];
    $NIDN = $_POST['NIDN'];
    $JenisKelamin = isset($_POST['JenisKelamin']) ? $_POST['JenisKelamin'] : '';
    $TempatLahir = $_POST['TempatLahir'];
    $Tanggal = $_POST['Tanggal'];
    $Alamat = $_POST['Alamat'];

    $sql = "INSERT INTO t_dosen (Nama, NIDN, JenisKelamin, TempatLahir, Tanggal, Alamat)
            VALUES ('$Nama', '$NIDN', '$JenisKelamin', '$TempatLahir', '$Tanggal', '$Alamat')";

    if (mysqli_query($koneksi, $sql)) {
        header('Location: list_dsen.php');
        exit();
    } else {
        echo 'Error: '.$sql.'<br>'.mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}