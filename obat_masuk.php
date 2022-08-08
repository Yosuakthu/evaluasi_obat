<?php
  include("layout/header.php");
  include("layout/navbar.php");
  include("layout/sidebar.php");

  $obat = query("SELECT * FROM data_obat 
  INNER JOIN pengguna ON data_obat.id_pengguna = pengguna.id_pengguna
  INNER JOIN masuk ON data_obat.id_masuk = masuk.id_masuk
  INNER JOIN satuan ON masuk.id_satuan = satuan.id_satuan
  INNER JOIN jenis ON masuk.id_jenis = jenis.id_jenis
  INNER JOIN kategori ON masuk.id_kategori = kategori.id_kategori
  INNER JOIN suplier ON masuk.id_suplier = suplier.id_suplier
  INNER JOIN ket ON masuk.id_ket = ket.id_ket
  INNER JOIN expire ON masuk.id_expire = expire.id_expire
  INNER JOIN obat ON expire.id_obat = obat.id_obat
  INNER JOIN respon ON data_obat.id_respon = respon.id_respon");
?>



 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Obat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Obat Masuk</li>
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
            <a href="t_obat_m.php" type="button" class="btn btn-success">Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="obat" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="30px">NO.</th>
                  <th>No Resep</th>
                  <th>Nama Dokter</th>
                  <th>Nama Obat</th>
                  <th>Satuan Obat</th>
                  <th>Jenis Obat</th>
                  <th width="100px">Kategori Obat</th>
                  <th width="150px">Tangal Masuk Resep</th>
                  <th width="150px">jumblah Obat Keluar</th>
                  <th>Keterangan</th>
                  <th width="100px">Status</th>
                  <?php if ($_SESSION["tingkatan"] == 1) : ?>
                  <th>Aksi</th>
                  <?php endif ?>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($obat as $key) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $key["id_data_obat"];?></td>
                  <td><?= $key["nama"]; ?></td>
                  <td><?= $key["obat"]; ?></td>
                  <td><?= $key["satuan"]; ?></td>
                  <td><?= $key["jenis"]; ?></td>
                  <td><?= $key["kategori"]; ?></td>
                  <td><?= $key["tgl_masuk"]; ?></td>
                  <td><?= $key["keluar"]; ?> <?= $key["satuan"]; ?></td>
                  <td><?= $key["ket_obat"]; ?></td>
                  <td><?= $key["respon"]; ?></td>
                  <?php if ($_SESSION["tingkatan"] == 1) : ?>
                    <td  width="167px">
                        <?php if ( $key["respon"] =='Belum Direspon') : ?>
                      <a href="terima.php?id=<?= $key["id_data_obat"];?>" class="btn btn-info" style="
                            float: center;"><i class="fa fa-check"></i></a>
                      <a href="tolak.php?id=<?= $key["id_data_obat"];?>" class="btn btn-warning" style="
                            float: center;"><i class="fa fa-window-close"></i></a>
                      <?php endif ?>
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