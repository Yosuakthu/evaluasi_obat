<?php
  include("layout/header.php");
  include("layout/navbar.php");
  include("layout/sidebar.php");

  $obat = query("SELECT * FROM data_obat 
  INNER JOIN pengguna ON data_obat.id_pengguna = pengguna.id_pengguna
  INNER JOIN obat ON data_obat.id_obat = obat.id_obat
  INNER JOIN respon ON data_obat.id_respon = respon.id_respon WHERE data_obat.id_respon = 2");
?>



 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Permintaan Obat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permintaan Obat</li>
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
              <table id="obat" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.</th>
                  <th>Nama Dokter</th>
                  <th>Nama Obat</th>
                  <th>Baanyak Obat</th>
                  <th>Keterangan Obat</th>
                  <?php if ($_SESSION["tingkatan"] == 3) : ?>
                  <th>Aksi</th>
                  <?php endif ?>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($obat as $key) : ?>
                <tr>
                  <td width="50px"><?= $i; ?></td>
                  <td><?= $key["nama"]; ?></td>
                  <td><?= $key["nama_obat"]; ?></td>
                  <td><?= $key["banyak"]; ?> Butir</td>
                  <td><?= $key["keterangan_obat"]; ?></td>
                  <?php if ($_SESSION["tingkatan"] == 3) : ?>
                  <td  width="200px">
                  <a href="terimap.php?id=<?= $key["id_obat"];?>" class="btn btn-info" style="
    float: center;"><i class="fa fa-check"></i></a>
                  <a href="hapus_obat_masuk.php?id=<?= $key["id_data_obat"] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?')" style="
                float: center;"><i class="fa fa-trash"></i></a></td>
                  </td>
                  <?php endif ?>
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