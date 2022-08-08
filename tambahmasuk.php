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
           
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
              <li class="breadcrumb-item"><a href="masuk.php">Data Obat Masuk</a></li>
              <li class="breadcrumb-item active">Tambah Data Kategori</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <form action="" method="post">
                  <div class="row">
                  <div class="col-md-6">
                <label for="obat">Nama Obat</label>
                    <select class="form-control" name="obat" id="obat" required>
                        <option></option>
                        <?php
                        $query1 =  "SELECT * FROM obat ";
                        $s = mysqli_query($conn,$query1);
                            while ($data = mysqli_fetch_array($s)) : ?>
                                <option value="<?= $data["id_obat"]; ?>" ><?= $data["obat"]; ?></option>
                            <?php endwhile ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="satuan">Satuan Obat</label>
                    <select class="form-control" name="satuan" id="satuan" required>
                        <option></option>
                        <?php
                        $query1 =  "SELECT * FROM satuan ";
                        $s = mysqli_query($conn,$query1);
                            while ($data = mysqli_fetch_array($s)) : ?>
                                <option value="<?= $data["id_satuan"]; ?>" ><?= $data["satuan"]; ?></option>
                            <?php endwhile ?>
                    </select>
                </div>
                  </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <label for="jenis">Jenis Obat</label>
                      <select class="form-control" name="jenis" id="jenis" required>
                          <option></option>
                          <?php
                          $query1 =  "SELECT * FROM jenis ";
                          $s = mysqli_query($conn,$query1);
                              while ($data = mysqli_fetch_array($s)) : ?>
                                  <option value="<?= $data["id_jenis"]; ?>" ><?= $data["jenis"]; ?></option>
                              <?php endwhile ?>
                      </select>
                  </div>
                  <div class="col-md-6">
                      <label for="kategori">Kategori Obat</label>
                      <select class="form-control" name="kategori" id="kategori" required>
                          <option></option>
                          <?php
                          $query1 =  "SELECT * FROM kategori ";
                          $s = mysqli_query($conn,$query1);
                              while ($data = mysqli_fetch_array($s)) : ?>
                                  <option value="<?= $data["id_kategori"]; ?>" ><?= $data["kategori"]; ?></option>
                              <?php endwhile ?>
                      </select>
                  </div>
                </div>

              <div class="row">
                <div class="col-md-6">
                    <label for="jum">jumblah Obat</label>
                    <input type="text" class="form-control" id="jum" name="jum"  required>
                  </div>
                <div class="col-md-6">
                    <label for="masuk">Tanggal Masuk Obat</label>
                    <input type="date" class="form-control" id="masuk" name="masuk"  required>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <label for="ex">Tanggal Expire Obat</label>
                    <input type="date" class="form-control" id="ex" name="ex"  required>
                  </div>
                  <div class="col-md-6">
                      <label for="suplier">Suplier Obat</label>
                      <select class="form-control" name="suplier" id="suplier" required>
                          <option></option>
                          <?php
                          $query1 =  "SELECT * FROM suplier ";
                          $s = mysqli_query($conn,$query1);
                              while ($data = mysqli_fetch_array($s)) : ?>
                                  <option value="<?= $data["id_suplier"]; ?>" ><?= $data["suplier"]; ?></option>
                              <?php endwhile ?>
                      </select>
                  </div>
              </div>
              <br>
                <div class="form-group">
                  <button  type="text"  name="kirim" class="btn btn-info"><i class="fa fa-check"></i>Kirim</button>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
  if (isset($_POST["kirim"])) {
    $obat = $_POST["obat"];
    $satuan = $_POST["satuan"];
    $jenis = $_POST["jenis"];
    $kategori = $_POST["kategori"];
    $jum = $_POST["jum"];
    $masuk = $_POST["masuk"];
    $expire = $_POST["ex"];
    $suplier = $_POST["suplier"];

    $sql1 = "INSERT INTO expire VALUES(NULL,'$obat','$expire')";
    mysqli_query($conn,$sql1) or die('gagal 1');

    $sql2 = "SELECT max(id_expire) AS id FROM expire LIMIT 1";
    $s = mysqli_query($conn,$sql2) or die('gagal 2');

    $data = mysqli_fetch_assoc($s);
    $id = $data["id"];

    if ($masuk > $expire) {
      $sql3 = "INSERT INTO masuk 
      VALUES(NULL,'$satuan','$jum','$jenis','$kategori','$id','$masuk','2','$suplier')";
      $s = mysqli_query($conn,$sql3) or die('gagal 3');
      if ($s) {
        echo "
        <script>
            alert('Data Berhasil Ditambah ')
            document.location.href = 'masuk.php';
        </script>
        ";
      }else {
        echo "
        <script>
            alert('Data Gagal Ditambah ')
            document.location.href = 'masuk.php';
        </script>
        ";
      }
    }else {
      $sql3 = "INSERT INTO masuk 
      VALUES(NULL,'$satuan','$jum','$jenis','$kategori','$id','$masuk','1','$suplier')";
      $s = mysqli_query($conn,$sql3) or die('gagal 3');
      if ($s) {
        echo "
        <script>
            alert('Data Berhasil Ditambah ')
            document.location.href = 'masuk.php';
        </script>
        ";
      }else {
        echo "
        <script>
            alert('Data Gagal Ditambah ')
            document.location.href = 'masuk.php';
        </script>
        ";
      }
    }

  }

?>




<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#obat").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>