<?php
  include("layout/header.php");
  include("layout/navbar.php");
  include("layout/sidebar.php");
    $id = $_GET["id"];
    $obat = query("SELECT * FROM obat_k WHERE id_obat_k = '$id'")[0];
?>



 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update data Obat Keluar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update data Obat Keluar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                
            </div>
            <div class="card-body" >
                <form action="" method="post">
                    <input type="hidden" name="id"  value="<?= $obat["id_obat_k"] ?>">
                <div class="form-group">
                                    <label for="no">Nama Obat</label>
                                    <input type="text" name="no" id="no" value="<?= $obat["obat_k"] ?>" class="form-control">
                                </div>
                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="text" name="stok" id="stok" value="<?= $obat["stok_k"] ?>" class="form-control">
                                </div>
                    <div class="form-group">
                   <button class="btn btn-primary" type="submit"  name="kirim"><i class="fa fa-check">Kirim</i></button>
                    </div>
                </form>
            </div>
        </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        <?php
            if (isset($_POST["kirim"])) {
                if (uok($_POST) > 0) {
                    echo "
                    <script>
                        alert('File Berhasil Dikirim')
                        document.location.href='obat_k.php';
                    </script>
                    ";
          }else {
              echo "
                    <script>
                        alert('File Gagal Dikirim')
                        document.location.href='obat_k.php';
                    </script>
                    ";
                }
            }
        ?>


<?php
  include("layout/footer.php");
?>