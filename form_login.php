<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Halaman Login</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
<div class="background">
  <div class="logo-left"></div>
  <div class="logo-right"></div>
  <div class="form-container">
    <h2>Login</h2>
    <form id="login-form" action="login.php" method="POST">
      <input type="email" id="email"  name="email" placeholder="Email" required><br>
      <input type="password" id="password" name="password" placeholder="Password" required><br>
      <input type="submit" value="Login">
    </form>
    <div id="registrasi-container">
    <p id="registrasi">Belum punya akun | <a href="form_registrasi.php">Buat sekarang</a></p>
  </div>
</div>
<script>
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