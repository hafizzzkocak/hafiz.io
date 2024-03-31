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
<html>
<head>
    <title>Form Profil</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      header {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-top: 5px;
        }
        .pesan {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
        <h1>Halaman Profil</h1>
    </header>
    <div class="upload">
        <img src="img/<?php echo $foto; ?>" width="125" height="125" title="<?php echo $foto; ?>">
        <div class="round">
            <form action="upload_foto.php" method="post" enctype="multipart/form-data">
                <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png">
                <button type="submit" style="display: none;"></button> <!-- Tombol submit yang disembunyikan -->
                <i class="fa fa-camera" style="color: #fff;"></i>
            </form>
        </div>
    </div>
    <p class="pesan">Selamat Datang, <?php echo $nama; ?>!</p> <!-- Ucapan selamat datang -->
    <script type="text/javascript">
        // Saat input file diubah, form akan otomatis disubmit
        document.getElementById("foto").onchange = function(){
            document.querySelector(".round button[type=submit]").click();
        };
    </script>
</body>
</html>