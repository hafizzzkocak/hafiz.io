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
    <link rel="stylesheet" href="coba.css">>
</head>
<body>
    <div class="">
        <form action="d_ubah.php" method="POST" class="form">
            <h1 class="isi">Form Ubah Data Dosen</h1>
<?php
    include 'koneksi.php';
    if (isset($_GET['NIDN'])) {
        $NIDN = $_GET['NIDN'];
        $sql = "SELECT * FROM t_dosen WHERE NIDN='$NIDN'";
        $result = mysqli_query($koneksi, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result); ?>
            <div class="form-group">
                <label for="NIDN">NIDN</label>
                <input type="number" id="NIDN" name="NIDN" value="<?php echo $row['NIDN']; ?>">
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" id="Nama" name="Nama" value="<?php echo $row['Nama']; ?>">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <input type="radio" id="laki" name="JenisKelamin" value="Laki-Laki" class="jk" <?php if ($row['JenisKelamin'] == 'Laki-Laki') {
                echo 'checked';
            } ?>><label for="laki">Laki-Laki</label>
                    <input type="radio" id="perempuan" name="JenisKelamin" value="Perempuan" class="jk" <?php if ($row['JenisKelamin'] == 'Perempuan') {
                echo 'checked';
            } ?>><label for="perempuan">Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="TempatLahir">Tempat Lahir</label>
                <input type="text" id="TempatLahir" name="TempatLahir" value="<?php echo $row['TempatLahir']; ?>">
            </div>
            <div class="form-group">
                <label for="Tanggal">Tanggal Lahir</label>
                <input type="date" id="Tanggal" name="Tanggal" value="<?php echo $row['Tanggal']; ?>">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <textarea id="Alamat" name="Alamat"><?php echo $row['Alamat']; ?></textarea>
            </div>
<?php
        } else {
            echo 'Data Dosen tidak ditemukan.';
        }
    } else {
        // Tampilkan formulir kosong untuk menambahkan data baru.
    }
?>
            <div class="btn">
                <input type="submit" value="Ubah">
                <a href="list_dsen.php" class="btn-kembali">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>