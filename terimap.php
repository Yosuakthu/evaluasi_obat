<?php
require 'koneksi.php';
  $id = $_GET["id"];

  $ambil = query("SELECT * FROM data_obat WHERE id_data_obat = '$id'")[0];
    $id1 = $ambil["id_data_obat"];
    $masuk = $ambil["id_masuk"];
    $tgl = $ambil["tgl_masuk"];
  $stok_obat = $ambil["keluar"];


$obat = query("SELECT * FROM masuk WHERE id_masuk = '$masuk'")[0];
$id_ = $obat["id_masuk"];
$b = $obat["jumblah"];
$c = 0;
$d = $b - $stok_obat;
if ($d < 0) {
  echo "
      <script>
          alert('Stok obat tidak Cukup')
          document.location.href = 'dro.php';
      </script>
      ";
      return false;
}

$e = "UPDATE masuk SET jumblah = '$d' WHERE id_masuk = '$id_'";
mysqli_query($conn,$e) or die('gagal');



  $sql = "INSERT INTO keluar VALUES(NULL,'$id_','$stok_obat','$tgl')";
  mysqli_query($conn,$sql);

  

  $query = "INSERT INTO resep VALUES(NULL,'$id1')";
$s = mysqli_query($conn,$query) or die('gagal');
if ($s) {
    echo "
    <script>
        alert('Data Berhasil Diterima ')
        document.location.href = 'dro.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('Data Gagal Diterima ')
        document.location.href = 'dro.php';
    </script>
    ";
}