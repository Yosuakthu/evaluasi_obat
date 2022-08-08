<?php
  include("layout/header.php");
  include("layout/navbar.php");
  include("layout/sidebar.php");

  $id = $_GET["id"];
  $ambil = query("SELECT * FROM suplier WHERE id_suplier = '$id'")[0];
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
              <li class="breadcrumb-item"><a href="suplier.php">Data Suplier</a></li>
              <li class="breadcrumb-item active">Edit Data Suplier</li>
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
              <div class="form-group">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $ambil["id_suplier"] ?>">
                  <label for="suplier">Nama Suplier Obat</label>
                  <input type="text" class="form-control" id="suplier" name="suplier" placeholder="Nama Suplier Obat" required value="<?= $ambil["suplier"] ?>">
                </div>
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
    $id = $_POST["id"];
    $suplier = $_POST["suplier"];
    $query = "UPDATE suplier SET 
    suplier = '$suplier' WHERE id_suplier = '$id'";
    $s = mysqli_query($conn,$query);
    if ($s) {
      echo "
      <script>
          alert('Data Berhasil Diedit')
          document.location.href = 'suplier.php';
      </script>
      ";
    }else {
      echo "
      <script>
          alert('Data Gagal Diedit ')
          document.location.href = 'suplier.php';
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