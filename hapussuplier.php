<?php
   require 'koneksi.php';

    $id = $_GET["id"];
    $s =    mysqli_query($conn,"DELETE FROM suplier WHERE id_suplier = $id");
    if($s) {
        echo "
        <script>
            alert('Data Berhasil Dihapus ')
            document.location.href = 'suplier.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Data Gagal Dihapus ')
            document.location.href = 'suplier.php';
        </script>
        ";
    }

    // include('../data_pertanian/include/footer/footer.php');
?>