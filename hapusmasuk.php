<?php
   require 'koneksi.php';

    $id = $_GET["id"];
    $s =    mysqli_query($conn,"DELETE FROM masuk WHERE id_masuk = $id");
    if($s) {
        echo "
        <script>
            alert('Data Berhasil Dihapus ')
            document.location.href = 'masuk.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Data Gagal Dihapus ')
            document.location.href = 'masuk.php';
        </script>
        ";
    }

    // include('../data_pertanian/include/footer/footer.php');
?>