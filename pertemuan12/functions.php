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

  mysqli_query($db, $query) or die(mysqli_error($db));
  //mysqli_error($db);
  //untuk memberitahu ada baris yang berubah di baris
  return mysqli_affected_rows($db);
}

function hapus($id)
{
  $db = koneksi();
  $result = mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");
  if (!$result) {
    die(mysqli_error($db));
  }
  //die untuk matikan program, jadi klo ad error di query program ga jalan tapi lgsg mati dan 
  //lgsg keluar errornya, biar tau errornya dimana
  return mysqli_affected_rows($db);
}

function ubah($data)
{
  // var_dump($data);
  $db = koneksi();

  //pecah datanya biar nti ga crash di query dengan ''
  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE
            mahasiswa
            SET 
            nama = '$nama',
            nrp = '$nrp',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id";

  mysqli_query($db, $query) or die(mysqli_error($db));
  //mysqli_error($db);
  //untuk memberitahu ada baris yang berubah di baris
  return mysqli_affected_rows($db);
}

function login($data)
{
  $db = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if ($username == 'admin' && $password == '12345') {
    //set session

    $_SESSION['login'] = true;
    header("Location: index.php");
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'Username / Password Salah!'
    ];
  }
}
