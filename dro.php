<?php
  include("layout/header.php");
  include("layout/navbar.php");
  include("layout/sidebar.php");

  $obat = query("SELECT * FROM resep
  INNER JOIN data_obat ON resep.id_data_obat = data_obat.id_data_obat
  INNER JOIN pengguna ON data_obat.id_pengguna = pengguna.id_pengguna
  INNER JOIN masuk ON data_obat.id_masuk = masuk.id_masuk
  INNER JOIN satuan ON masuk.id_satuan = satuan.id_satuan
  INNER JOIN jenis ON masuk.id_jenis = jenis.id_jenis
  INNER JOIN kategori ON masuk.id_kategori = kategori.id_kategori
  INNER JOIN suplier ON masuk.id_suplier = suplier.id_suplier
  INNER JOIN ket ON masuk.id_ket = ket.id_ket
  INNER JOIN expire ON masuk.id_expire = expire.id_expire
  INNER JOIN obat ON expire.id_obat = obat.id_obat
  ");
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
    <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="obat" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.</th>
                  <th>No Resep</th>
                  <th>Nama Dokter</th>
                  <th>Nama Obat</th>
                  <th>Satuan Obat</th>
                  <th>Jenis Obat</th>
                  <th>Kategori Obat</th>
                  <th>Tangal Masuk Resep</th>
                  <th>jumblah Obat Keluar</th>
                  <th>Keterangan Resep</th>
                  <?php if ($_SESSION["tingkatan"] == 1) : ?>
                  <th>Aksi</th>
                  <?php endif ?>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($obat as $key) : ?>
                <tr>
                  <td width="50px"><?= $i; ?></td>
                  <td><?= $key["id_data_obat"];?></td>
                  <td><?= $key["nama"]; ?></td>
                  <td><?= $key["obat"]; ?></td>
                  <td><?= $key["satuan"]; ?></td>
                  <td><?= $key["jenis"]; ?></td>
                  <td><?= $key["kategori"]; ?></td>
                  <td><?= $key["tgl_masuk"]; ?></td>
                  <td><?= $key["keluar"]; ?> <?= $key["satuan"]; ?></td>
                  <td><?= $key["ket_obat"]; ?></td>
                  <?php if ($_SESSION["tingkatan"] == 1) : ?>
                  <td  width="200px">
                  <a href="hapus_resep.php?id=<?= $key["id_resep"] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?')" style="
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
    <script src="include/dataTables.buttons.min.js"></script>
    <script src="include/jszip.min.js"></script>
    <script src="include/pdfmake.min.js"></script>
    <script src="include/vfs_fonts.js"></script>
    <script src="include/buttons.html5.min.js"></script>
    <script src="include/buttons.print.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(document).ready(function() {
    $('#obat').DataTable( {
      "responsive": true,
      "autoWidth": true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
</body>
</html>