<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Halaman Register</title>
<link rel="stylesheet" href="registrasi.css">
</head>
<body>
<div class="form-container">
  <h2>Buat Akun</h2>
  <form id="register-form" action="registrasi.php" method="POST">
    <div class="input-container">
      <input type="text" name="nama" id="nama" placeholder="Nama" required>
      <div id="name-feedback"></div>
    </div>
    <input type="email" name="email" id="email" placeholder="Email" required><br>
    <div id="email-feedback"></div>
    <input type="password" name="password" id="register-password" placeholder="Password" required><br>
    <input type="password" id="confirm-password" placeholder="Konfirmasi Password" required><br>
    <input type="submit" value="Buat">
  </form>
  <div id="registrasi-container">
<p id="registrasi">Sudah punya akun | <a href="form_login.php">Login</a></p>
  </div>
</div>

    <script>
        document.getElementById("nama").addEventListener("input", function() {
    var name = this.value;
    var nameFeedback = document.getElementById("name-feedback");

    // Lakukan request AJAX untuk memeriksa keberadaan nama dalam database
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "check_name.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                if (response === "digunakan") {
                    nameFeedback.textContent = "Nama sudah digunakan.";
                    nameFeedback.style.color = "red";
                } else {
                    nameFeedback.textContent = "Nama tersedia.";
                    nameFeedback.style.color = "green";
                }
            } else {
                console.error("Terjadi kesalahan: " + xhr.status);
            }
        }
    };
    xhr.send("nama=" + name);
});
    </script>
     <script>
        document.getElementById("email").addEventListener("input", function() {
    var name = this.value;
    var nameFeedback = document.getElementById("email-feedback");

    // Lakukan request AJAX untuk memeriksa keberadaan nama dalam database
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "check_email.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                if (response === "digunakan") {
                    nameFeedback.textContent = "email sudah digunakan.";
                    nameFeedback.style.color = "red";
                } else {
                    nameFeedback.textContent = "email tersedia.";
                    nameFeedback.style.color = "green";
                }
            } else {
                console.error("Terjadi kesalahan: " + xhr.status);
            }
        }
    };
    xhr.send("email=" + name);
});
    </script>
</form>
<script>
// JavaScript untuk menampilkan popup setelah registrasi berhasil
var urlParams = new URLSearchParams(window.location.search);
var success = urlParams.get('success');

if (success === 'true') {
    var confirmation = confirm("Akun berhasil dibuat, silahkan login");

    if (confirmation) {
        window.location.href = "form_login.php";
    }
}
</script>
</body>
</html>

