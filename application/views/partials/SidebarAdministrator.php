

<aside class="main-sidebar sidebar-dark-primary elevation-4"> 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-1 mb-3 d-flex"> 
        <div class="info">   
          <a href="" class="d-block text-"><h5>Gerlink Utama Mandiri</h5></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline"> 
        
      </div>
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?= base_url()?>Administrator" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-bell nav-icon"></i>
                  <p>Dashboard Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link ">
                  <i class="far fa-bell nav-icon"></i>
                  <p>Dashboard Elektro</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-bell nav-icon"></i>
                  <p>Dashboard Mekanik</p>
                </a>
              </li>
            </ul> -->
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>Administrator/admin/dashboard" class="nav-link">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>Administrator/admin/MasterBarang" class="nav-link">
                  <i class="fas fa-box nav-icon"></i>
                  <p>Master Barang</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?= base_url()?>administrator/admin/KomponenMasuk" class="nav-link">
                  <i class="fas fa-dolly-flatbed nav-icon"></i>
                  <p>Komponen Masuk</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?= base_url()?>administrator/admin/KomponenKeluar" class="nav-link">
                  <i class="fas fa-dolly nav-icon"></i>
                  <p>Komponen Keluar</p>
                </a>
              </li>  
            </ul>
          </li>  
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bolt"></i>
              <p>
                Purchasing Elektro
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingElektro/dashboard" class="nav-link">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingElektro/MasterBarang" class="nav-link">
                  <i class="fas fa-box nav-icon"></i>
                  <p>Master Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingElektro/KomponenMasuk" class="nav-link">
                  <i class="fas fa-dolly-flatbed nav-icon"></i>
                  <p>Komponen Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingElektro/KomponenKeluar" class="nav-link">
                  <i class="fas fa-dolly nav-icon"></i>
                  <p>Komponen Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingElektro/MasterPengambilan" class="nav-link">
                  <i class="fas fa-box-open nav-icon"></i>
                  <p>Master Pengambilan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingElektro/MasterInventaris" class="nav-link">
                  <i class="fas fa-box-tissue nav-icon"></i>
                  <p>Master Inventaris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Unit Deskripsi</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Purchasing Mekanik
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingMekanik/Dashboard" class="nav-link">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingMekanik/MasterBarang" class="nav-link">
                  <i class="fas fa-box nav-icon"></i>
                  <p>Master Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingMekanik/MasterInventaris" class="nav-link">
                  <i class="fas fa-box-tissue nav-icon"></i>
                  <p>Master Inventaris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingMekanik/KomponenMasuk" class="nav-link">
                  <i class="fas fa-dolly-flatbed nav-icon"></i>
                  <p>Komponen Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingMekanik/InventarisMasuk" class="nav-link">
                  <i class="fas fa-dolly-flatbed nav-icon"></i>
                  <p>Inventaris Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingMekanik/KomponenKeluar" class="nav-link">
                  <i class="fas fa-dolly nav-icon"></i>
                  <p>Komponen Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>PurchasingMekanik/InventarisKeluar" class="nav-link">
                  <i class="fas fa-dolly nav-icon"></i>
                  <p>Inventaris Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Unit Deskripsi</p>
                </a>
              </li>  
            </ul>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    
    <!-- /.sidebar -->
  </aside>
  