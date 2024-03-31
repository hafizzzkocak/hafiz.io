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

    // Perhatikan bahwa perintah SQL yang benar adalah UPDATE, bukan INSERT INTO.
    $sql = "UPDATE t_mahasiswa 
            SET Nama='$Nama', Jurusan='$Jurusan', JenisKelamin='$JenisKelamin', Tanggal='$Tanggal', TempatLahir='$TempatLahir', Alamat='$Alamat' 
            WHERE NIM='$NIM'";

    if (mysqli_query($koneksi, $sql)) {
        // Redirect ke halaman list_mhs.php setelah data berhasil diupdate.
        header('Location: list_mhs.php');
        exit();
    } else {
        echo 'Error: '.$sql.'<br>'.mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>