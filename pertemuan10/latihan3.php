<?php
require 'functions.php'; //dihubungkan untuk bisa pake function 
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa Ubaya</h3>

  <a href="tambah.php">Tambah data mahasiswa</a>
  <br>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>
    <?php foreach ($mahasiswa as $m) : ?>
      <tr>
        <td><?= $m['id']; ?></td> <!--atau buat variable diatas di sebelum foreach $i =1, lalu di dalam tag td nya dollarM diganti dollari++-->
        <td><img src="images/<?= $m['gambar']; ?>" width=" 80"></td>
        <td><?= $m['nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $m['id']; ?>">Lihat Detail</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>