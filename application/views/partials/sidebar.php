<aside class="main-sidebar sidebar-dark-primary elevation-4"> 
	<div class="sidebar"> 
		<div class="user-panel mt-2 pb-1 mb-3 d-flex">
			<div class="info">
				<a href="" class="d-block text-">
					<h4>Gerlink Inventory</h4>
				</a>
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
				<!-- fixsidebar -->
				<li class="nav-header"></li> 
				<li class="nav-header">Dashboard</li> 
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'elektro' || $this->session->login['role'] == 'mekanik'|| $this->session->login['role'] == 'supervisor') : ?>
					<!-- <li class="nav-item">
						<a href="<?= base_url('PurchasingElektro/DashboardElektro') ?>" class="nav-link <?= $aktif == 'DashboardElektro' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard Elektro
							</p>
						</a>
					</li> -->
					<li class="nav-item">
						<a href="<?= base_url('GudangBahanRM/Dashboard') ?>" class="nav-link <?= $aktif == 'DashboardMekanik' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard
							</p>
						</a>
					</li>
				<?php endif; ?>  
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'produksi') : ?>
					<li class="nav-item">
						<a href="<?= base_url('Produksi/DashboardProduksi') ?>" class="nav-link <?= $aktif == 'DashboardProduksi' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard Produksi
							</p>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'quality') : ?>
					<li class="nav-item">
						<a href="<?= base_url('QualityControl/DashboardQc') ?>" class="nav-link <?= $aktif == 'DashboardQc' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard QC
							</p>
						</a> 
					</li>
				<?php endif; ?>

				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'packing') : ?>
					<li class="nav-item">
						<a href="<?= base_url('Packing/DashboardPacking') ?>" class="nav-link <?= $aktif == 'DashboardPacking' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard Packing
							</p>
						</a> 
					</li>
				<?php endif; ?>
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'pemesanan') : ?>
					<li class="nav-item">
						<a href="<?= base_url('PemesananBarang/DashboardPemesanan') ?>" class="nav-link <?= $aktif == 'DashboardPemesanan' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard Pemeasanan
							</p>
						</a> 
					</li>
				<?php endif; ?>
				
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'elektro' || $this->session->login['role'] == 'produksi' 
						 || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'quality' || $this->session->login['role'] == 'packing' 
						 || $this->session->login['role'] == 'supervisor') : ?>
				<li class="nav-header">Data Master</li> 
				<?php endif; ?>

				<!-- <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'elektro' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingElektro/BarangElektro') ?>" class="nav-link <?= $aktif == 'BarangElektro' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Master Komponen Elektro
							</p>
						</a>
					</li> 
					<li class="nav-item">
						<a href="<?= base_url('PurchasingMekanik/BarangMekanik') ?>" class="nav-link <?= $aktif == 'BarangMekanik' ? 'active' : '' ?>"> 
						<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Master Barang Mekanik
							</p>
						</a>
					</li>  -->
					<li class="nav-item">
						<a href="<?= base_url('GudangBahanRM/DataMaster') ?>" class="nav-link <?= $aktif == 'BautMur_DataMaster' ? 'active' : '' ?>"> 
						<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Master Bahan Baku
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('GudangBarangJadi/DataMaster') ?>" class="nav-link <?= $aktif == 'BarangJadi_DataMaster' ? 'active' : '' ?>"> 
						<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Master Barang Jadi
							</p>
						</a>
					</li>
					<!-- <li class="nav-item">
						<a href="<?= base_url('PurchasingMekanik/BarangMekanik') ?>" class="nav-link <?= $aktif == 'BarangMekanik' ? 'active' : '' ?>"> 
						<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Perekat
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingMekanik/BarangMekanik') ?>" class="nav-link <?= $aktif == 'BarangMekanik' ? 'active' : '' ?>"> 
						<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Barang Setengah Jadi
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingMekanik/BarangMekanik') ?>" class="nav-link <?= $aktif == 'BarangMekanik' ? 'active' : '' ?>"> 
						<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Bahan Cair
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingMekanik/BarangMekanik') ?>" class="nav-link <?= $aktif == 'BarangMekanik' ? 'active' : '' ?>"> 
						<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Percetakan dan Pengecetan
							</p>
						</a>
					</li> -->
				<?php endif; ?>
				
				<!-- <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingMekanik/BarangInventaris_Mekanik') ?>" class="nav-link <?= $aktif == 'BarangInventaris_Mekanik' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Master Inventaris
							</p>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingMekanik/BarangPinjam_Mekanik') ?>" class="nav-link <?= $aktif == 'BarangPinjam_Mekanik' ? 'active' : '' ?>"> <i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Master Peminjaman
							</p>
						</a>
					</li>
				<?php endif; ?> -->
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'quality') : ?>
					<li class="nav-item">
						<a href="<?= base_url('QualityControl/MasterAlat') ?>" class="nav-link <?= $aktif == 'MasterAlat' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Master Alat
							</p>
						</a>
					</li>
				<?php endif; ?>

				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'packing') : ?>
					<li class="nav-item">
						<a href="<?= base_url('Packing/MasterPacking') ?>" class="nav-link <?= $aktif == 'MasterPacking' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Master Packing
							</p>
						</a>
					</li>
				<?php endif; ?>

				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'produksi') : ?>
					<li class="nav-item">
						<a href="<?= base_url('Produksi/MasterProgress') ?>" class="nav-link <?= $aktif == 'MasterProgress' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Progress Produksi
							</p>
						</a>
					</li>
				<?php endif; ?>

				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'produksi') : ?>
					<li class="nav-item">
						<a href="<?= base_url('Produksi/MasterStokAlat') ?>" class="nav-link <?= $aktif == 'MasterStokAlat' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-box nav-icon"></i>
							<p>
								Stok Alat
							</p>
						</a>
					</li>
				<?php endif; ?>
				
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'produksi') : ?>
				<li class="nav-header">Hasil Kerja</li>
				<?php endif; ?>
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'produksi') : ?>
					<li class="nav-item">
						<a href="<?= base_url('Produksi/KemajuanProduksi') ?>" class="nav-link <?= $aktif == 'KemajuanProduksi' ? 'active' : '' ?>">
							<i class="fas fa-briefcase nav-icon"></i>
							<p>
								Progress Produksi 
							</p>
						</a>
					</li>
				<?php endif; ?>

				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'produksi') : ?>
					<li class="nav-item">
						<a href="<?= base_url('Produksi/StokAlat') ?>" class="nav-link <?= $aktif == 'StokAlat' ? 'active' : '' ?>">
							<i class="fas fa-briefcase nav-icon"></i>
							<p>
								Stok Alat 
							</p>
						</a>
					</li>
				<?php endif; ?>
				
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'pemesanan') : ?>
				<li class="nav-header">Pemesanan Barang</li> 
				<li class="nav-item">
					<a href="<?= base_url('PemesananBarang/Ekatalog') ?>" class="nav-link <?= $aktif == 'Ekatalog' ? 'active' : '' ?>">
						<i class="fas fa-dolly nav-icon"></i>
						<p>
							E-katalog
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('PemesananBarang/NonEkatalog') ?>" class="nav-link <?= $aktif == 'NonEkatalog' ? 'active' : '' ?>">
						<i class="fas fa-dolly nav-icon"></i>
						<p>
							Non E-katalog
						</p>
					</a>
				</li>
			<?php endif; ?> 
			
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'elektro' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
				<li class="nav-header">Transaksi Masuk</li>
				<?php endif; ?>

				<!-- <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'elektro'|| $this->session->login['role'] == 'mekanik'  || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingElektro/PenerimaanElektro') ?>" class="nav-link <?= $aktif == 'PenerimaanElektro' ? 'active' : '' ?>">
							<i class="fas fa-dolly-flatbed nav-icon"></i>
							<p>
								Komponen Masuk Elektro
							</p>
						</a>
					</li>
				<?php endif; ?> -->
				<!-- <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingMekanik/PenerimaanMekanik') ?>" class="nav-link <?= $aktif == 'PenerimaanMekanik' ? 'active' : '' ?>">
							<i class="fas fa-dolly-flatbed nav-icon"></i>
							<p>
								komponen Masuk Mekanik
							</p>
						</a>
					</li>
				<?php endif; ?> -->
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('GudangBahanRM/Penerimaan') ?>" class="nav-link <?= $aktif == 'BautMur_Penerimaan' ? 'active' : '' ?>">
							<i class="fas fa-dolly-flatbed nav-icon"></i>
							<p>
								Masuk Bahan Baku
							</p>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('GudangBarangJadi/Penerimaan') ?>" class="nav-link <?= $aktif == 'BarangJadi_Penerimaan' ? 'active' : '' ?>">
							<i class="fas fa-dolly-flatbed nav-icon"></i>
							<p>
								Masuk Barang Jadi
							</p>
						</a>
					</li>
				<?php endif; ?>
				<!-- <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingMekanik/PenerimaanInventaris_Mekanik') ?>" class="nav-link <?= $aktif == 'PenerimaanInventaris_Mekanik' ? 'active' : '' ?>">
							<i class="fas fa-dolly-flatbed nav-icon"></i>
							<p>
								Barang Inventaris
							</p>
						</a>
					</li>
				<?php endif; ?>  -->
				

				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'elektro' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
				<li class="nav-header">Transaksi Keluar</li>
				<?php endif; ?>
				
				<!-- <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'elektro' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingElektro/PengeluaranElektro') ?>" class="nav-link  <?= $aktif == 'PengeluaranElektro' ? 'active' : '' ?>">
							<i class="fas fa-dolly nav-icon"></i>
							<p>
								Komponen Keluar Elektro
							</p>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingMekanik/PengeluaranMekanik') ?>" class="nav-link <?= $aktif == 'PengeluaranMekanik' ? 'active' : '' ?>">
							<i class="fas fa-dolly nav-icon"></i>
							<p>
								Komponen Keluar Mekanik
							</p>
						</a>
					</li>
				<?php endif; ?>   -->
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('GudangBahanRM/Pengeluaran') ?>" class="nav-link <?= $aktif == 'PengeluaranMekanik' ? 'active' : '' ?>">
							<i class="fas fa-dolly nav-icon"></i>
							<p>
								Keluar Bahan Baku
							</p>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('GudangBarangJadi/Pengeluaran') ?>" class="nav-link <?= $aktif == 'PengeluaranBarangJadi' ? 'active' : '' ?>">
							<i class="fas fa-dolly nav-icon"></i>
							<p>
								Keluar Barang Jadi
							</p>
						</a>
					</li>
				<?php endif; ?>
				<!-- <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('PurchasingMekanik/PengeluaranInventaris_Mekanik') ?>" class="nav-link <?= $aktif == 'PengeluaranInventaris_Mekanik' ? 'active' : '' ?>">
							<i class="fas fa-dolly nav-icon"></i>
							<p>
								Barang Inventaris
							</p>
						</a>
					</li>
				<?php endif; ?>  -->

			<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'quality') : ?>
			<li class="nav-header">Hasil QC</li> 
			<li class="nav-item">
				<a href="<?= base_url('QualityControl/StokAlat') ?>" class="nav-link <?= $aktif == 'StokQc' ? 'active' : '' ?>">
					<i class="fas fa-folder nav-icon"></i>
					<p>
						Hasil QC
					</p>
				</a>
			</li>
			<!--<li class="nav-header">Pengiriman Barang</li> -->
			<!--<li class="nav-item">-->
			<!--	<a href="<?= base_url('QualityControl/PengirimanEkatalog') ?>" class="nav-link <?= $aktif == 'PengirimanEkatalog' ? 'active' : '' ?>">-->
			<!--		<i class="fas fa-dolly nav-icon"></i>-->
			<!--		<p>-->
			<!--			E-Katalog-->
			<!--		</p>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li class="nav-item">-->
			<!--	<a href="<?= base_url('QualityControl/PengirimanNonEka') ?>" class="nav-link <?= $aktif == 'PengirimanNonEka' ? 'active' : '' ?>">-->
			<!--		<i class="fas fa-dolly nav-icon"></i>-->
			<!--		<p>-->
			<!--			Non E-Katalog-->
			<!--		</p>-->
			<!--	</a>-->
			<!--</li> -->

			<!--<li class="nav-header">Histori Keluar</li> -->
			<!--<li class="nav-item">-->
			<!--	<a href="<?= base_url('QualityControl/HistoriEkatalog') ?>" class="nav-link <?= $aktif == 'HistoriEkatalog' ? 'active' : '' ?>">-->
			<!--		<i class="fas fa-clock nav-icon"></i>-->
			<!--		<p>-->
			<!--			E-Katalog-->
			<!--		</p>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li class="nav-item">-->
			<!--	<a href="<?= base_url('QualityControl/HistoriNonEka') ?>" class="nav-link <?= $aktif == 'HistoriNonEka' ? 'active' : '' ?>">-->
			<!--		<i class="fas fa-clock nav-icon"></i>-->
			<!--		<p>-->
			<!--			Non E-Katalog-->
			<!--		</p>-->
			<!--	</a>-->
			<!--</li> -->






			<?php endif; ?> 
			
			

			<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'packing') : ?>
				<li class="nav-header">Transaksi Packing</li> 
					<li class="nav-item">
						<a href="<?= base_url('Packing/HasilPacking') ?>" class="nav-link <?= $aktif == 'HasilPacking' ? 'active' : '' ?>">
							<i class="fas fa-dolly nav-icon"></i>
							<p>
								Hasil Packing
							</p>
						</a>
					</li>
					 <li class="nav-item">
						<a href="<?= base_url('Packing/PengirimanBarang') ?>" class="nav-link <?= $aktif == 'PengirimanBarang' ? 'active' : '' ?>">
							<i class="fas fa-dolly nav-icon"></i>
							<p>
								Pengiriman Barang
							</p>
						</a>
					</li>
					<!--<li class="nav-item">
						<a href="<?= base_url('Packing/PengembalianBarang') ?>" class="nav-link <?= $aktif == 'PengembalianBarang' ? 'active' : '' ?>">
							<i class="fas fa-dolly nav-icon"></i>
							<p>
								Pengembalian Barang
							</p>
						</a>
					</li> -->
			<?php endif; ?> 


			<!-- <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'elektro' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
			<li class="nav-header">Inventaris</li> 
			<?php endif; ?>
			
			
		  <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
          <li class="nav-item">
            <a href="<?= base_url('PurchasingMekanik/PeminjamanBarang') ?>" class="nav-link <?= $aktif == 'PeminjamanBarang' ? 'active' : '' ?>">
              <i class="fas fa-solid fa-scroll nav-icon"></i>
              <p>
                 Pinjam Barang
              </p>
            </a>
          </li> 
		  <?php endif; ?>
		  <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
          <li class="nav-item">
            <a href="<?= base_url('PurchasingMekanik/PengembalianBarang') ?>" class="nav-link <?= $aktif == 'PengembalianBarang' ? 'active' : '' ?>">
              <i class="fas fa-solid fa-scroll nav-icon"></i>
              <p>
                 Pengembalian Barang
              </p>
            </a>
          </li> 
		  <?php endif; ?>
		  <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
          <li class="nav-item">
            <a href="<?= base_url('PurchasingMekanik/HistoriPeminjaman') ?>" class="nav-link <?= $aktif == 'HistoriPeminjaman' ? 'active' : '' ?>">
              <i class="fas fa-solid fa-scroll nav-icon"></i>
              <p>
                 Histori Peminjaman
              </p>
            </a>
          </li> 
		  <?php endif; ?>
			<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'elektro' || $this->session->login['role'] == 'mekanik'  || $this->session->login['role'] == 'supervisor') : ?>
				<li class="nav-item">
					<a href="<?= base_url('PurchasingElektro/InventarisElektro') ?>" class="nav-link <?= $aktif == 'InventarisElektro' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-book"></i>
						<p>
							Inventaris Elektro
						</p>
					</a> 
				</li>
			<?php endif; ?>
			<li class="nav-item">
				<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'elektro' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<a href="<?= base_url('PurchasingElektro/PengambilanElektro') ?>" class="nav-link <?= $aktif == 'PengambilanElektro' ? 'active' : '' ?>">
						<i class="fas fa-bolt nav-icon"></i>
						<p>
							Pengambilan Komponen Elektro
						</p>
					</a>
			</li> 
			<?php endif; ?> -->
			
			
			
		  <!-- <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
		  <li class="nav-header">Barang Sisa</li> 
          <li class="nav-item">
            <a href="<?= base_url('PurchasingMekanik/SisaBahan') ?>" class="nav-link <?= $aktif == 'SisaBahan' ? 'active' : '' ?>">
              <i class="fas fa-solid fa-scroll nav-icon"></i>
              <p>
                 Sisa Bahan
              </p>
            </a>
          </li> 
		  <li class="nav-item">
            <a href="<?= base_url('PurchasingMekanik/Histori_SisaBahan') ?>" class="nav-link <?= $aktif == 'Histori_SisaBahan' ? 'active' : '' ?>">
              <i class="fas fa-solid fa-scroll nav-icon"></i>
              <p>
                 Histori Sisa Bahan
              </p>
            </a>
          </li> 
		  <?php endif; ?> -->

		  <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik'|| $this->session->login['role'] == 'elektro') : ?>
		  <li class="nav-header">Manajemen Penggambil</li>
				<li class="nav-item">
					<a href="<?= base_url('PurchasingElektro/NamaPengambil') ?>" class="nav-link <?= $aktif == 'NamaPengambil' ? 'active' : '' ?>">
						<i class="fas fa-user nav-icon"></i>
						<p>
							Nama Pengambil
						</p>
					</a>
				</li>
				<!-- <li class="nav-item">
					<a href="<?= base_url('PurchasingElektro/NamaPengambil') ?>" class="nav-link <?= $aktif == 'NamaPengambil' ? 'active' : '' ?>">
						<i class="fas fa-user nav-icon"></i>
						<p>
							Nama Distributor
						</p>
					</a>
				</li> -->
		  
			<?php endif; ?>

			
			<!-- <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
					<li class="nav-item">
						<a href="<?= base_url('GudangBahanTools/DashboardGB_Tools') ?>" class="nav-link <?= $aktif == 'DashboardGB_Tools' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard Bahan Tools
							</p>
						</a>
					</li>
				<?php endif; ?>  -->


				
			<?php if ($this->session->login['role'] == 'super') : ?>
				<li class="nav-header">Manajemen Pengguna</li>
				<li class="nav-item">
					<a href="<?= base_url('pengguna') ?>" class="nav-link">
						<i class="fas fa-user nav-icon"></i>
						<p>
							Super Admin
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Pengguna_A') ?>" class="nav-link">
						<i class="fas fa-user nav-icon"></i>
						<p>
							Admin
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Pengguna_QC') ?>" class="nav-link">
						<i class="fas fa-user nav-icon"></i>
						<p>
							QC
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Pengguna_E') ?>" class="nav-link">
						<i class="fas fa-user nav-icon"></i>
						<p>
							Elektro
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Pengguna_M') ?>" class="nav-link">
						<i class="fas fa-user nav-icon"></i>
						<p>
							Mekanik
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Pengguna_S') ?>" class="nav-link">
						<i class="fas fa-user nav-icon"></i>
						<p>
							Supervisor
						</p>
					</a>
				</li> 
			<?php endif; ?>
			<!-- <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'quality') : ?>
				<li class="nav-header">File Manager</li>
				<li class="nav-item">
					<a href="<?= base_url('QualityControl/FileQC') ?>" class="nav-link <?= $aktif == 'FileQC' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Upload Document
						</p>
					</a>
				</li>
			<?php endif; ?> -->


			</ul>

		</nav> 
	</div>
	<!-- /.sidebar -->
</aside> 
