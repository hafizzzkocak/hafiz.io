<?php

// Lakukan koneksi ke database
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Periksa keberadaan nama dalam database
    $check_query = "SELECT * FROM tb_profil WHERE email='$email'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        echo 'digunakan';
    } else {
        echo 'tersedia';
    }
}
