<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['email'])) {
    header("location: form_login.php");
    exit();
}

$email = $_SESSION['email'];

if(isset($_FILES['foto'])) {
    $foto = $_FILES['foto'];

    $fotoName = $foto['name'];
    $fotoTmpName = $foto['tmp_name'];
    $fotoSize = $foto['size'];
    $fotoError = $foto['error'];

    $fotoExt = strtolower(pathinfo($fotoName, PATHINFO_EXTENSION));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fotoExt, $allowed)) {
        if ($fotoError === 0) {
            if ($fotoSize < 5000000) {
                $fotoNewName = uniqid('', true).".".$fotoExt;
                $fotoDestination = 'img/'.$fotoNewName;
                move_uploaded_file($fotoTmpName, $fotoDestination);
                
                $sql = "UPDATE tb_profil SET foto='$fotoNewName' WHERE email='$email'";
                mysqli_query($koneksi, $sql);
                header("location: form_profil.php");
                exit();
            } else {
                echo "Ukuran file terlalu besar.";
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "Tipe file tidak didukung.";
    }
} else {
    header("location: form_profil.php");
    exit();
}
?>