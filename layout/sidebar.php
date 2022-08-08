
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">EVALUASI OBAT</span>
    </a>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Manajemen Data</li>

          <!-- admin -->
          <?php if ($_SESSION["tingkatan"] == 1) : ?>
          <li class="nav-item has-treeview">
            <a href="user.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="t_obat_m.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Input Resep Obat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="obat_masuk.php" class="nav-link">
              <i class="nav-icon fas fa-clone"></i>
              <p>Data Resep Obat Masuk</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-file-alt nav-icon"></i>
                  <p>
                  Master Data
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="satuan.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Satuan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="jenis.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Jenis</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="kategori.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Kategori</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="obat.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Obat</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="expire.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Expire</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="suplier.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Suplier</p>
                    </a>
                  </li>
                </ul>
              </li>
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-cart-plus nav-icon"></i>
                  <p>
                  Transaksi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="masuk.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Masuk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="obat_k.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Keluar</p>
                    </a>
                  </li>
                </ul>
              </li>
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-book-reader nav-icon"></i>
                  <p>
                  Evaluasi Data
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="dipakai.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Sering Digunakan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="tdkpakai.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Kurang Digunakan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
            <a href="dro.php" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Resep</p>
            </a>
          </li>
              <!-- <li class="nav-item has-treeview">
            <a href="pages/examples/logout.php" class="nav-link">
              <i class="nav-icon fa fa-door-closed"></i>
              <p>
                Logout
              </p>
            </a>
          </li> -->
            <?php endif ?>
            <!-- dokter -->
          <?php if ($_SESSION["tingkatan"] == 2) : ?>
          <li class="nav-item has-treeview">
            <a href="t_obat_m.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Input Resep Obat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="obat_masuk.php" class="nav-link">
              <i class="nav-icon fas fa-clone"></i>
              <p>Data Resep Obat Masuk</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-cart-plus nav-icon"></i>
                  <p>
                  Transaksi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="masuk.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Masuk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="obat_k.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Keluar</p>
                    </a>
                  </li>
                </ul>
              </li>
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-book-reader nav-icon"></i>
                  <p>
                  Evaluasi Data
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="dipakai.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Sering Digunakan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="tdkpakai.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Kurang Digunakan</p>
                    </a>
                  </li>
                </ul>
              </li>
          <li class="nav-item">
            <a href="dro.php" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Resep</p>
            </a>
          </li>
            <?php endif ?>
            <!-- apotik -->
            <?php if ($_SESSION["tingkatan"] == 3) : ?>
          <li class="nav-item">
            <a href="resep.php" class="nav-link">
              <i class="nav-icon fas fa-clone"></i>
              <p>Cek Resep Obat</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-cart-plus nav-icon"></i>
                  <p>
                  Transaksi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="masuk.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Masuk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="obat_k.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Keluar</p>
                    </a>
                  </li>
                </ul>
              </li>
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-book-reader nav-icon"></i>
                  <p>
                  Evaluasi Data
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="dipakai.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Sering Digunakan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="tdkpakai.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Obat Kurang Digunakan</p>
                    </a>
                  </li>
                </ul>
              </li>
          <li class="nav-item">
            <a href="dro.php" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Resep</p>
            </a>
          </li>
            <?php endif ?>
            
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>