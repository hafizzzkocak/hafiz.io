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
    <title>Homepage</title>
    <style>
        header {
            background-color: #4caf50; /* Ubah warna latar belakang header menjadi hijau */
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-top: 5px;
        }
        section {
            padding: 20px;
            text-align: center; /* Menengahkan konten dalam section */
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            justify-content: center; /* Menengahkan grid gallery */
        }
        .gallery-item img {
            width: 100%;
            height: auto;
        }
        .credit{
          text-align:center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Halaman Home</h1>
    </header>

    <section>
        <h2>Video Berkah</h2>
        
            <!-- Video Example -->
            <div class="gallery-item">
                <iframe width="500" height="300" src="https://www.youtube.com/embed/GfpDr6AsK_I?si=pj_5GAHzEX5pT9U-" frameborder="0" allowfullscreen></iframe>
            </div>
          
        </div>
    </section>

    <footer>
        <p class="credit">&copy; 2024 Hafiz Ilmu Padi</p>
    </footer>
</body>
</html>