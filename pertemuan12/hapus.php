<?php
//require untuk menghubungkan halaman ke function
require 'functions.php';

//pengecekan jika tidak ada id
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

//mengambil id dari url
$id = $_GET['id'];

//if hapus berhasil menghasilkan nilai lebih dari 0 maka ada yang dihapus kalo
//nol gaada yang dihapus kalo -1 error
if (hapus($id) > 0) {
  echo "<script>
  alert('data berhasil dihapus');
  document.location.href = 'index.php'
</script>";
} else {
  echo "data gagal ditambahkan";
}
