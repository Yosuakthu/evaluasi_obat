<?php
require 'koneksi.php';
  $id = $_GET["id"];
  $ambil = query("SELECT * FROM data_obat")[0];
  $ambil["id_respon"] = 2;
  $level = $ambil["id_respon"];

  $query = "UPDATE data_obat SET
  id_respon = '$level'
  WHERE id_data_obat = '$id'";
 $s = mysqli_query($conn,$query);
 if ($s) {
    echo "
    <script>
        alert('Data Berhasil Diproses ')
        document.location.href = 'obat_masuk.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('Data Gagal Diproses ')
        document.location.href = 'obat_masuk.php';
    </script>
    ";
 }
 