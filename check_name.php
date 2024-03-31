<?php

// Lakukan koneksi ke database
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['nama'];

    // Periksa keberadaan nama dalam database
    $check_query = "SELECT * FROM tb_profil WHERE nama='$name'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        echo 'digunakan';
    } else {
        echo 'tersedia';
    }
}
