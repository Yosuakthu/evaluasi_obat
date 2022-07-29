<?php
   require 'koneksi.php';

    $id = $_GET["id"];

    if( hapusobat($id) > 0) {
        echo "
        <script>
            alert('Data Berhasil Dihapus ')
            document.location.href = 'obat.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Data Gagal Dihapus ')
            document.location.href = 'obat.php';
        </script>
        ";
    }

    // include('../data_pertanian/include/footer/footer.php');
?>