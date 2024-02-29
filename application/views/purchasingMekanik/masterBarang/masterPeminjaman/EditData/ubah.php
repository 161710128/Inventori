<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $titleHead ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url()?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url()?>assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper"> 
  <!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
		<li class="nav-item">
			<!-- <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> -->
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<!-- <a href="index3.html" class="nav-link">Home</a> -->
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<!-- <a href="#" class="nav-link">Contact</a> -->
		</li>
		</ul>

		<!-- SEARCH FORM -->
		<form class="form-inline ml-3"> 
		</form>
	
		<ul class="navbar-nav ml-auto"> 
		<li class="nav-item dropdown"> 
		</li> 
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
			<span class="mr-2 d-none d-lg-inline text-gray-600 small"> <h6><?= $this->session->login['nama'] ?></h6> </span> 
			</a> 
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown"> 
				<a class="dropdown-item" href="<?= base_url('logout') ?>">
				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a> 
			</div> 
		</li> 
		</ul>
	</nav>
	<!-- /.navbar -->

  
  		<!-- Main Sidebar Container --> 
  		<?php $this->load->view("partials/sidebar");?> 
		<div id="content-wrapper" class="content-wrapper" > 
			 <!-- <br> -->

			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">  
						<div class="col-sm-12"> 
							<h1 class="float-left"><?= $title?></h1> 
							<h1 class="float-right"><a href="<?= base_url('purchasingMekanik/BarangPinjam_Mekanik') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></h1> 	
						</div>
					</div>
					<!-- /.row -->
					<hr>
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->


			<section id="content" class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6">
							<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Isi Form Dibawah Ini!</h3>
							</div>
							<!-- /.card-header -->
								<div class="card-body">
									<form action="<?= base_url('PurchasingMekanik/BarangPinjam_Mekanik/proses_ubah/' . $barang->kode_part) ?>" id="form-tambah" method="POST">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="kode_part"><strong>Kode Part</strong></label>
												<input type="text" name="kode_part" placeholder="Masukkan Kode Part" autocomplete="off"  class="form-control" required value="<?= $barang->kode_part  ?>" maxlength="8" readonly>
											</div>
											<div class="form-group col-md-6">
												<label for="nama_barang"><strong>Nama Barang</strong></label>
												<input type="text" name="nama_barang" placeholder="Masukkan Nama komponen" autocomplete="off"  class="form-control" required value="<?= $barang->nama_barang ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="spesifikasi"><strong>Spesifikasi</strong></label>
												<input type="text" name="spesifikasi" placeholder="Masukkan Spesifikasi" autocomplete="off"  class="form-control" required value="<?= $barang->spesifikasi ?>"> 
											</div> 
											<div class="form-group col-md-6">
												<label for="satuan"><strong>Satuan</strong></label>
												<select name="satuan" id="satuan" class="form-control" required>
													<option value="">Pilih Satuan</option>
													<option value="pcs" <?= $barang->satuan == 'pcs' ? 'selected' : '' ?>>PCS</option>
													<option value="set" <?= $barang->satuan == 'set' ? 'selected' : '' ?>>Set</option> 
												</select>
											</div> 
										</div>
										<!-- <div class="form-row">
											<div class="form-group col-md-6">
												<label for="status"><strong>Status</strong></label>
												<select name="status" id="status" class="form-control" required>
													<option value="">Pilih Status</option>
													<option value="free" <?= $barang->status == 'free' ? 'selected' : '' ?>>FREE</option>
													<option value="dipinjam" <?= $barang->status == 'dipinjam' ? 'selected' : '' ?>>Dipinjam</option> 
												</select>
											</div> 
											<div class="form-group col-md-6">
												<label for="keterangan"><strong>Keterangan</strong></label>
												<select name="keterangan" id="keterangan" class="form-control" required>
													<option value="">Pilih Keterangan</option>
													<option value="bagus" <?= $barang->keterangan == 'bagus' ? 'selected' : '' ?>>Bagus</option>
													<option value="rusak" <?= $barang->keterangan == 'rusak' ? 'selected' : '' ?>>Rusak</option> 
													<option value="hilang" <?= $barang->keterangan == 'hilang' ? 'selected' : '' ?>>Hilang</option> 
												</select>
											</div> 
										</div>  -->
										<hr>
										<div class="form-group">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
											<!-- <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button> -->
										</div>
									</form>
								</div>	
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- /.content --> 
		</div> 
  <?php $this->load->view("partials/footer");?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper --> 
 <!-- jQuery -->
<script src="<?= base_url()?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url()?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>assets/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/template/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url()?>assets/template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url()?>assets/template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url()?>assets/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()?>assets/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()?>assets/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()?>assets/template/dist/js/demo.js"></script> 
<!-- overlayScrollbars -->
<script src="<?= base_url()?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

</body>
</html>
