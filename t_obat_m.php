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

    <?php
        $query = mysqli_query($conn, "SELECT max(id_data_obat) as kode FROM data_obat");
        $data = mysqli_fetch_array($query);
        $kodeTr = $data['kode'];

        $urutan = (int) substr($kodeTr, 3, 3);
        $urutan++;
        $huruf = "RST";
        $kode = $huruf . sprintf("%03s", $urutan);
    ?>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body" >
                <form action="" method="post">
                <div class="row">
                  <input type="hidden" name="id" value="<?= $_SESSION["id"] ?>">
                  <div class="col-md-4">
                                    <label for="">Kode Transaksi</label>
                                    <input type="text" class="form-control" name="kode" value="<?= $kode ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="id">Nama Dokter</label>
                                    <input type="text" class="form-control" id="id" name="nama" value="<?= $_SESSION["nama"] ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Resep</label>
                                        <input type="date" class="form-control" name="tgl_masuk" value="2022-08-06" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <label for="obat">Obat</label>
                                <select name="obat" id="obat" class="form-control" required>
                                    <option value="">- Plih Obat -</option>
                                    <?php
                                    $query1 =  "SELECT * FROM masuk INNER JOIN expire ON masuk.id_expire = expire.id_expire
                                    INNER JOIN obat ON expire.id_obat = obat.id_obat WHERE masuk.id_ket = 1 ";
                            $s = mysqli_query($conn,$query1);
                                while ($data = mysqli_fetch_array($s)) : ?>
                                    <option value="<?= $data["id_obat"]; ?>" ><?= $data["obat"]; ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                            <label for="keluar">Jumblah Obat Keluar</label>
                            <input type="number" name="keluar" class="form-control" placeholder="Obat Keluar" required>
                        </div>
                            </div>
                            <label for="ket">Keterangan</label>
                        <div class="form-group">
                            <textarea name="ket" id="Ket" cols="87" rows="3"></textarea>
                        </div>
                            <br>
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