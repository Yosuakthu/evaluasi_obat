<?php
  include("layout/header.php");
  include("layout/navbar.php");
  include("layout/sidebar.php");


    $obat = query("SELECT *,keluar.id_masuk,COUNT(keluar.id_masuk) AS masuk FROM keluar 
    INNER JOIN masuk ON keluar.id_masuk = masuk.id_masuk
    INNER JOIN satuan ON masuk.id_satuan = satuan.id_satuan
    INNER JOIN jenis ON masuk.id_jenis = jenis.id_jenis
    INNER JOIN kategori ON masuk.id_kategori = kategori.id_kategori
    INNER JOIN suplier ON masuk.id_suplier = suplier.id_suplier
    INNER JOIN ket ON masuk.id_ket = ket.id_ket
    INNER JOIN expire ON masuk.id_expire = expire.id_expire
    INNER JOIN obat ON expire.id_obat = obat.id_obat GROUP BY keluar.id_masuk ORDER BY COUNT(keluar.id_masuk) DESC LIMIT 5 ");


    
    



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
              <li class="breadcrumb-item"><a href="#">Evaluasi Data</a></li>
              <li class="breadcrumb-item active">Obat Sering Digunakan</li>
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
                  <th>Nama Obat</th>
                  <th>Satauan Obat</th>
                  <th>Jenis Obat</th>
                  <th>Kategori Obat</th>
                  <th>Jumblah Obat Keluar</th>
                  <th>Tanggal Keluar Obat</th>
                  <th>Expire Obat</th>
                  <th>Keterangan</th>
                  <th width="250px">Suplier Obat</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($obat as $key) : ?>
                <tr>
                <td width="50px"><?= $i; ?></td>
                  <td><?= $key["obat"]; ?></td>
                <td><?= $key["satuan"]; ?></td>
                <td><?= $key["jenis"]; ?></td>
                <td><?= $key["kategori"]; ?></td>
                <td><?= $key["keluar"]; ?></td>
                <td><?= $key["tgl_klr"]; ?></td>
                <td><?= $key["expire"]; ?></td>
                <td><?= $key["ket"]; ?></td>
                <td><?= $key["suplier"]; ?></td>
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