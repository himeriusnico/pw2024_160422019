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
