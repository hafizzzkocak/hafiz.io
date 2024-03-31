<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 
    $sql = "INSERT INTO tb_profil (nama, email, password) VALUES ('$name', '$email', '$hashed_password')";

    if ($koneksi->query($sql) === true) {
        header("Location: form_registrasi.php?success=true");
        exit();
    } else {
        echo 'Error: '.$sql.'<br>'.$koneksi->error;
    }
}

$koneksi->close();
?>
