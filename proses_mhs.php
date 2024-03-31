<?php

require_once 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nama = $_POST['Nama'];
    $NIM = $_POST['NIM'];
    $Jurusan = $_POST['Jurusan'];
    $JenisKelamin = isset($_POST['JenisKelamin']) ? $_POST['JenisKelamin'] : '';
    $TempatLahir = $_POST['TempatLahir'];
    $Tanggal = $_POST['Tanggal'];
    $Alamat = $_POST['Alamat'];

    $sql = "INSERT INTO t_mahasiswa (Nama, NIM, Jurusan, JenisKelamin, Tanggal, TempatLahir, Alamat)
            VALUES ('$Nama', '$NIM', '$Jurusan', '$JenisKelamin', '$Tanggal', '$TempatLahir', '$Alamat')";

    if (mysqli_query($koneksi, $sql)) {
        header('Location: list_mhs.php');
        exit();
    } else {
        echo 'Error: '.$sql.'<br>'.mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
