<?php

require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['NIDN'])) {
    $NIDN = $_GET['NIDN'];

    // Lakukan query untuk menghapus data mahasiswa berdasarkan NIM
    $query = "DELETE FROM t_dosen WHERE NIDN='$NIDN'";
    if (mysqli_query($koneksi, $query)) {
        echo 'Data Dosen berhasil dihapus.';
        echo "<meta http-equiv=refresh content=1;URL='list_dsen.php'>";
    } else {
        echo 'Gagal menghapus data dosen: '.mysqli_error($koneksi);
    }
} else {
    echo 'Akses tidak sah.';
}

mysqli_close($koneksi);
