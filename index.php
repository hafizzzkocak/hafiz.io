<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title></title>
    <style>
        /* Tambahkan gaya khusus untuk navbar */
        .navbar-custom {
            background-color: #4CAF50; /* Warna hijau */
        }

        .navbar-custom .navbar-brand {
            color: #fff; /* Warna teks putih */
        }

        .navbar-custom .navbar-nav .nav-link {
            color: #fff; /* Warna teks putih */
        }

        .navbar-custom .navbar-toggler-icon {
            background-color: #fff; /* Warna ikon toggler putih */
        }

        .navbar-custom .navbar-toggler {
            border-color: #fff; /* Warna border toggler putih */
        }
        .navbar-custom .profile-image {
            margin-right: 10px; /* Jarak antara foto profil dengan teks */
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
        }
        .navbar-custom .profile-image img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom"> <!-- Tambahkan kelas navbar-custom -->
  <div class="container-fluid">
    <img src="logo.png" alt="" width="50px" height="50px">
    <a class="navbar-brand" href="#">STMIK SYAIKH ZAINUDDIN</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="form_profil.php">Profil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="List_mhs.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Mahasiswa
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Form_mhs.php">Form Mahasiswa</a></li>
            <li><a class="dropdown-item" href="list_mhs.php">List Mahasiswa</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="List_mhs.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Dosen
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Form_dosen.php">Form Dosen</a></li>
            <li><a class="dropdown-item" href="list_dsen.php">List Dosen</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="form_logout.php">Logout</a>
        </li>
      </ul>
      <img src="img/<?php echo $foto; ?>" class="profile-image" title="<?php echo $foto; ?>">
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    // Mendapatkan semua item navbar
    const navLinks = document.querySelectorAll('.nav-link');

    // Tambahkan event listener untuk setiap link navbar
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Hapus kelas 'active' dari semua link navbar
            navLinks.forEach(navLink => {
                navLink.classList.remove('active');
            });

            // Tambahkan kelas 'active' ke link yang diklik
            this.classList.add('active');
        });
    });
</script>
</body>
</html>