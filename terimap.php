<?php
require 'koneksi.php';
  $id = $_GET["id"];

  $ambil = query("SELECT * FROM data_obat INNER JOIN obat ON data_obat.id_obat = obat.id_obat WHERE data_obat.id_obat = '$id'")[0];
    $id1 = $ambil["id_data_obat"];
  $nama_obat = $ambil["nama_obat"];
  $stok_obat = $ambil["banyak"];


$obat = query("SELECT * FROM obat")[0];
$id_ = $obat["id_obat"];
$b = $obat["stok_obat"];
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

$e = "UPDATE obat SET Stok_obat = '$d' WHERE id_obat = '$id_'";
mysqli_query($conn,$e) or die('gagal');



  $sql = "INSERT INTO obat_k VALUES(NULL,'$nama_obat','$stok_obat')";
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