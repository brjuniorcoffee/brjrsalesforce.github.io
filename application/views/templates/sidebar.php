
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url(); ?>assets/dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sales Force</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user['fullname']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the . class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('modal'); ?>" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
  <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
</svg>
              <p>Rincian Modal</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('pelanggan'); ?>" class="nav-link">
              <i class="fas fa-users"></i>
              <p>Pelanggan</p>
            </a>
          </li>

          <li class="nav-item">
                <a href="<?= base_url('produk') ?>" class="nav-link" id="produk">
                <i class="fas fa-store"></i>
                  <p>Produk</p>
                </a>
              </li>

          <li class="nav-item">
                <a href="<?= base_url('invoice') ?>" class="nav-link">
                <i class="fas fa-file-invoice"></i>
                  <p>Penjualan</p>
                </a>
              </li>


              <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-coins"></i>
              <p>
               Cek Ongkir
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('cek_ongkir/jne') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>JNE</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('cek_ongkir/anter_aja'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anter Aja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('cek_ongkir/jt'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>J&T</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('cek_ongkir/pos_indonesia'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pos Indonesia</p>
                </a>
              </li>
            </ul>
            </li>

              <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-coins"></i>
              <p>
                Pengeluaran
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('pembelian/kebutuhan_harian') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kebutuhan Sehari-hari</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('pembelian/pembelian_kopi'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembelian Kopi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>