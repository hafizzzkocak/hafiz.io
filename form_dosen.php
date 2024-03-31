<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit();
}

$email = $_SESSION['email'];

$sql = "SELECT * FROM tb_profil WHERE email='$email'";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);

$nama = $row['nama'];
$foto = empty($row['foto']) ? 'noprofil.jpg' : $row['foto'];
?>
<?php include 'index.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dosen</title>
    <link rel="stylesheet" href="coba.css">
</head>
<body>
    <div class="">
    <h1 class="isi">Form Input Data Dosen</h1>
        <form action="dosen.php" method="POST" class="form">
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" id="Nama" name="Nama">
            </div>
            <div class="form-group">
                <label for="NIDN">NIDN</label>
                <input type="number" id="NIDN" name="NIDN">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <input type="radio" id="laki" name="JenisKelamin" value="Laki-Laki" class="jk"><label for="laki">Laki-Laki</label>
                    <input type="radio" id="perempuan" name="JenisKelamin" value="Perempuan" class="jk"><label for="perempuan">Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="TempatLahir">Tempat Lahir</label>
                <input type="text" id="TempatLahir" name="TempatLahir">
            </div>
            <div class="form-group">
                <label for="Tanggal">Tanggal Lahir</label>
                <input type="date" id="Tanggal" name="Tanggal">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <textarea id="Alamat" name="Alamat"></textarea>
            </div>
            <div class="btn">
                <input type="reset" value="Hapus">
                <input type="submit" value="Simpan">
            </div>
        </form>
    </div>
</body>
</html>
