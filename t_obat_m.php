<?php
  include("layout/header.php");
  include("layout/navbar.php");
  include("layout/sidebar.php");

?>



 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Input Resep Obat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Input Resep Obat</li>
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
                <div class="form-group">
                                    <label for="id">Nama Dokter</label>
                                    <select class="form-control" name="id" id="id" required>
                                    
                                        <option></option>
                                        <?php
                                        $query =  "SELECT * FROM pengguna WHERE id_tingkatan = 2";
                                        $s = mysqli_query($conn,$query);
                                        while ($data = mysqli_fetch_array($s)) : ?>
                                            <option value="<?= $data["id_pengguna"]; ?>" ><?= $data["nama"]; ?></option>
                                            <?php endwhile ?>
                                    </select>
                                </div>
                <div class="form-group">
                                    <label for="ido">Nama obat</label>
                                    <select class="form-control" name="ido" id="ido" required>
                                    
                                        <option></option>
                                        <?php
                                        $query =  "SELECT * FROM obat WHERE id_obat";
                                        $s = mysqli_query($conn,$query);
                                        while ($data = mysqli_fetch_array($s)) : ?>
                                            <option value="<?= $data["id_obat"]; ?>" ><?= $data["nama_obat"]; ?></option>
                                            <?php endwhile ?>
                                    </select>
                                </div>
                                <div class="form-group">
                        <label for="banyak">Banyak Obat(Butir)</label>
                        <input type="text" class="form-control" name="banyak" id="banyak">
                    </div>
                    <label for="ket">Keterangan Obat</label>
                    <div class="form-group">
                        <textarea id="ket" name="ket"  cols="50" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="res" value="1">
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
                if (tambah($_POST) > 0) {
                    echo "
                    <script>
                        alert('File Berhasil Dikirim')
                        document.location.href='obat_masuk.php';
                    </script>
                    ";
          }else {
              echo "
                    <script>
                        alert('File Gagal Dikirim')
                        document.location.href='obat_masuk.php';
                    </script>
                    ";
                }
            }
        ?>


<?php
  include("layout/footer.php");
?>