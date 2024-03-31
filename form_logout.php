<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout</title>
  <link rel="stylesheet" href="logout.css">
</head>
<body>
<form action="logout.php" method="post" class="container">
  <div class="message">Anda yakin ingin logout?</div>
  <div class="btn">
    <input type="submit" name="logout" value="Ya">
    <input type="button" value="Tidak" onclick="location.href='home.php';">
  </div>
</form>
</body>
</html>