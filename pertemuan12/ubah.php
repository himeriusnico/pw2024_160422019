<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

//pengecekan jika tidak ada id
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

//ambil id dari url
$id = $_GET['id'];
//query mahasiswa berdasarkan id
$m = query("SELECT * FROM mahasiswa WHERE id = $id");


//cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  //var_dump($_POST);

  if (ubah($_POST) > 0) {
    echo "<script>
        alert('data berhasil diubah');
        document.location.href = 'index.php'
    </script>";
  } else {
    echo "data gagal diubah";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah data mahasiswa</title>
</head>

<body>
  <h3>Form ubah Data Mahasiswa</h3>
  <!-- supaya ngirim id tapi ndak keliatan sama user -->
  <input type="hidden" name="id" value=<?= $m['id']; ?>>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Nama:
          <input type="text" name="nama" autofocus required value=<?= $m['nama']; ?>>
        </label>
      </li>
      <li>
        <label>
          NRP:
          <input type="text" name="nrp" required value=<?= $m['nrp']; ?>>
        </label>
      </li>
      <li>
        <label>
          Email:
          <input type="text" name="email" required value=<?= $m['email']; ?>>
        </label>
      </li>
      <li>
        <label>
          Jurusan:
          <input type="text" name="jurusan" required value=<?= $m['jurusan']; ?>>
        </label>
      </li>
      <li>
        <label>
          Gambar:
          <input type="text" name="gambar" required value=<?= $m['gambar']; ?>>
        </label>
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data !</button>
      </li>
    </ul>

  </form>
</body>

</html>