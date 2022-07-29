<?php
   require 'koneksi.php';

    $id = $_GET["id"];

    if( hapus_db($id) > 0) {
        echo "
        <script>
            alert('Data Berhasil Dihapus ')
            document.location.href = 'obat_masuk.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Data Gagal Dihapus ')
            document.location.href = 'obat_masuk.php';
        </script>
        ";
    }

    // include('../data_pertanian/include/footer/footer.php');
?>