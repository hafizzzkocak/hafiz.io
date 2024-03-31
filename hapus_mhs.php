<?php

require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Lakukan query untuk menghapus data mahasiswa berdasarkan NIM
    $query = "DELETE FROM t_mahasiswa WHERE NIM='$nim'";
    if (mysqli_query($koneksi, $query)) {
        echo 'Data mahasiswa berhasil dihapus.';
        echo "<meta http-equiv=refresh content=1;URL='list_mhs.php'>";
    } else {
        echo 'Gagal menghapus data mahasiswa: '.mysqli_error($koneksi);
    }
} else {
    echo 'Akses tidak sah.';
}

mysqli_close($koneksi);
