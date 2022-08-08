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
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item"><a href="#">Data Expire</a></li>
              <li class="breadcrumb-item active">Tambah Data Expire</li>
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
              <div class="form-group">
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
              <div class="form-group">
                  <label for="expire">Tanggal Expire</label>
                  <input type="date" class="form-control" id="expire" name="expire" required>
                </div>
                <div class="form-group">
                  <button  type="submit"  name="kirim" class="btn btn-info"><i class="fa fa-check"></i>Kirim</button>
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
    $id_obat = $_POST["obat"];
    $ex = $_POST["expire"];
    $query = "INSERT INTO expire VALUES (NULL,'$id_obat','$ex')";
    $s = mysqli_query($conn,$query) or die('gagal 1');
    if ($s) {
      echo "
      <script>
          alert('Data Berhasil Ditambah ')
          document.location.href = 'expire.php';
      </script>
      ";
    }else {
      echo "
      <script>
          alert('Data Gagal Ditambah ')
          document.location.href = 'expire.php';
      </script>
      ";
  }
}

?>




<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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