<?php
  include("layout/header.php");
  include("layout/navbar.php");
  include("layout/sidebar.php");

  $obat = query("SELECT * FROM pengguna INNER JOIN tingkatan On pengguna.id_tingkatan = tingkatan.id_tingkatan");
?>



 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
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
            <a href="tambahuser.php" type="button" class="btn btn-success">Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="obat" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.</th>
                  <th>Nama Pengguna</th>
                  <th>Username</th>
                  <th>Level User</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($obat as $key) : ?>
                <tr>
                  <td width="50px"><?= $i; ?></td>
                  <td><?= $key["nama"]; ?></td>
                  <td><?= $key["username"]; ?></td>
                  <td><?= $key["tingkatan"]; ?></td>
                  <td  width="150px">
                  <a href="ubahuser.php?id=<?= $key["id_pengguna"];?>" class="btn btn-info" style="
    float: center;"><i class="fa fa-edit"></i></a>
                  <a href="hapususer.php?id=<?= $key["id_pengguna"] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?')" style="
    float: center;"><i class="fa fa-trash"></i></a></td>
                  </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach ?>
                <tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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