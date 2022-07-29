<?php
  include("layout/header.php");
  include("layout/navbar.php");
  include("layout/sidebar.php");
?>


<?php
    // include("../../koneksi.php");
    function ambildata_obat(){
        global $conn;
        return (int) mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM data_obat"))[0];
    }
    function ambilobatmasuk(){
        global $conn;
        return (int) mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM obat"))[0];
    }
    function ambilobatk(){
        global $conn;
        return (int) mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM obat_k"))[0];
    }
    function ambildatatolak(){
        global $conn;
        return (int) mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM resep "))[0];
    }

?>



 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?= $_SESSION["nama"] ?></a></li>
              <li class="breadcrumb-item active"><?= $_SESSION["nama2"] ?></li>
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
              <h1>Selamat Datang <?= $_SESSION["nama"] ?> </h1>
            </div>
            <!-- /.card-body -->
          </div>

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= ambildata_obat() ?></h3>
                
                <p>Data Resep Obat Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= ambilobatmasuk() ?></h3>


                <p>Data Obat Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= ambilobatk() ?></h3>

                <p>Data Obat keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= ambildatatolak() ?></h3>

                <p>Laporan Resep</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
  include("layout/footer.php");
?>