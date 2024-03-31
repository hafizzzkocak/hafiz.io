document.addEventListener('DOMContentLoaded', function () {
  const uploadButton = document.getElementById('upload-button');
  const photoUpload = document.getElementById('photo-upload');
  const usernameSpan = document.getElementById('nama');
  const photo = document.getElementById('user-photo');

  // Fungsi untuk menampilkan foto yang diupload
  function previewPhoto(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
      photo.src = e.target.result;
    };

    reader.readAsDataURL(file);
  }

  // Event listener untuk tombol "Tambah Foto"
  uploadButton.addEventListener('click', function () {
    photoUpload.click();
  });

  // Event listener untuk saat foto diupload
  photoUpload.addEventListener('change', function (event) {
    previewPhoto(event);
  });

  // Mengambil nama pengguna dari server menggunakan AJAX setelah login
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      usernameSpan.textContent = this.responseText;
    }
  };
  xhr.open("POST", "profil.php", true); // Ganti dengan alamat yang benar untuk mengambil nama pengguna
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  // Gantilah 'email' dan 'password' dengan variabel yang sesuai dengan nilai yang dimasukkan pengguna saat login
  const email = 'email';
  const password = 'password';
  
  xhr.send("$email=" + encodeURIComponent(email) + "$password=" + encodeURIComponent(password));
});