<?php

session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Lakukan query untuk mendapatkan data pengguna berdasarkan email dari database
    $query = "SELECT * FROM tb_profil WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Memeriksa apakah password yang dimasukkan cocok dengan hash yang disimpan di database
        if (password_verify($password, $row['password'])) {
            // Jika password cocok, set session dan redirect ke halaman profil
            $_SESSION['email'] = $email;
            $_SESSION['nama'] = $row['nama'];
            header('Location: form_profil.php');
            exit(); // Pastikan tidak ada output lain sebelum melakukan redirect
        } else {
            // Jika password tidak cocok, redirect kembali ke halaman login dengan pesan error
            header('Location: form_login.php?error=password');
            exit();
        }
    } else {
        // Jika email tidak ditemukan, redirect kembali ke halaman login dengan pesan error
        header('Location: form_login.php?error=email');
        exit();
    }
}
