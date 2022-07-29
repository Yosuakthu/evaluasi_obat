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
            <h1 class="m-0 text-dark">Input Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Input Data user</li>
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
            <div class="card-body" >
                <form action="" method="post">
                <div class="form-group">
                                    <label for="nama">Nama User</label>
                                    <input type="text" name="nama" id="nama" class="form-control">
                                </div>
                <div class="form-group">
                                    <label for="user">Username</label>
                                    <input type="text" name="user" id="user" class="form-control">
                                </div>
                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" name="pass" id="pass" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tingkatan">Level</label>
                                    <select class="form-control" name="id" id="id" required>
                                    
                                    <option></option>
                                    <?php
                                    $query =  "SELECT * FROM tingkatan WHERE id_tingkatan != 1";
                                    $s = mysqli_query($conn,$query);
                                    while ($data = mysqli_fetch_array($s)) : ?>
                                        <option value="<?= $data["id_tingkatan"]; ?>" ><?= $data["tingkatan"]; ?></option>
                                        <?php endwhile ?>
                                </select>
                            </div>
                                </div>
                    <div class="form-group">
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
                if (tambahuser($_POST) > 0) {
                    echo "
                    <script>
                        alert('File Berhasil Dikirim')
                        document.location.href='user.php';
                    </script>
                    ";
          }else {
              echo "
                    <script>
                        alert('File Gagal Dikirim')
                        document.location.href='user.php';
                    </script>
                    ";
                }
            }
        ?>


<?php
  include("layout/footer.php");
?>