<!--Semua fungsi yang dibutuhkan koneksi, query, tambahdata, ubah/hapus, dll-->
<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw_160422019');
}

function query($query)
{
  $db = koneksi();
  $result = mysqli_query($db, $query);

  //jika hasil hanya satu data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  // var_dump($data);
  $db = koneksi();

  //pecah datanya biar nti ga crash di query dengan ''
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
            mahasiswa
            VALUES
            (null, '$nama','$nrp', '$email', '$jurusan', '$gambar')";

  mysqli_query($db, $query);
  mysqli_error($db);
  //untuk memberitahu ada baris yang berubah di baris
  return mysqli_affected_rows($db);
}
