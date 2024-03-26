<!-- //koneksi ke db & pilih db
//$db = mysqli_connect('localhost', 'root', '', 'pw_160422019');
//'namahost', 'usernamemysql', 'pw', 'namadatabase'

//query isi tabel mahasiswa
//$result = mysqli_query($db, "SELECT * FROM mahasiswa");

//ubah data ke dalam bentuk array
//var_dump($result); //buat ngelihat isi dari suatu variabel
//ngecheck error nya
// if(!$result){
//   echo mysqli_error($db);
// }
//array ada 3 tipe numerik, asosiatif, array
//$row = mysqli_fetch_row($result); <--numerik
//$row = mysqli_fetch_assoc($result); <--asosiatif
//$row = mysqli_fetch_array($result); <--array, 2" nya ada numerik dan asosiatif

//tampung dulu ke array kosong
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
} //selama masih ada data lakukan looping untuk menampilkan semuanya

//var_dump($rows);

//tampung ke variabel mahasiswa
$mahaiswa = $rows; -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa Ubaya</h3>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>NRP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Aksi</th>
    </tr>
    <?php foreach ($mahaiswa as $m) : ?>
      <tr>
        <td><?= $m['id']; ?></td> <!--atau buat variable diatas di sebelum foreach $i =1, lalu di dalam tag td nya dollarM diganti dollari++-->
        <td><img src="images/<?= $m['gambar']; ?>" width=" 80"></td>
        <td><?= $m['nrp']; ?></td>
        <td><?= $m['nama']; ?></td>
        <td><?= $m['email']; ?></td>
        <td><?= $m['jurusan']; ?></td>
        <td>
          <a href="">ubah</a> | <a href="">hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>