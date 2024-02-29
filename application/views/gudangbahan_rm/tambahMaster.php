<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $titleHead ?></title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/fontawesome-free/css/all.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<style>
		.checkbox {
			width: 50%;
			float: left;
		}
	</style>
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
						<span class="mr-2 d-none d-lg-inline text-gray-600 small">
							<h6><?= $this->session->login['nama'] ?></h6>
						</span>
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
		<?php $this->load->view("partials/sidebar"); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('GudangBahanRM/DataMaster') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
				</div>
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<!-- /.row -->
					<!-- Main row -->
					<div class="row">
						<div class="container-fluid">
							<div class="row">
								<div class="col-6">
									<!-- general form elements -->
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">Isi Form dibawah Ini !</h3>
										</div>
										<!-- /.card-header -->
										<!-- form start -->
										<form action="<?= base_url('GudangBahanRM/DataMaster/proses_tambah') ?>" id="form-tambah" method="POST">
											<div class="card-body">
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="kode_komponen"><strong>Kode Komponen</strong></label>
														<input type="text" name="kode_komponen" id="kode_komponen" placeholder="Kode Komponen" autocomplete="off" class="form-control" required readonly>
													</div>
													<div class="form-group col-md-6">
														<label for="nama_komponen"><strong>Nama Barang</strong></label>
														<input type="text" name="nama_komponen" placeholder="Masukkan Nama Komponen" autocomplete="off" class="form-control" required>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="spesifikasi"><strong>Spesifikasi</strong></label>
														<input type="text" name="spesifikasi" placeholder="Masukkan Spesifikasi" autocomplete="off" class="form-control" required>
													</div>
													<div class="form-group col-md-6">
														<label for="qty_unit"><strong>QTY / Unit</strong></label>
														<input type="text" name="qty_unit" placeholder="Masukkan QTY/Unit" autocomplete="off" class="form-control" required>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="stok_minimal"><strong>Stok Minimal</strong></label>
														<input type="number" name="stok_minimal" placeholder="Masukkan Stok Minimal" autocomplete="off" class="form-control" required>
													</div>
													<div class="form-group col-md-6">
														<label for="satuan"><strong>Satuan</strong></label>
														<select name="satuan" id="satuan" class="form-control" required>
															<option value="">Pilih Satuan</option>
															<option value="liter">Liter</option>
															<option value="meter">Meter</option>
															<option value="rol">Rol</option>
															<option value="pcs">Pcs</option>
															<option value="batang">Batang</option>
															<option value="lembar">Lembar</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="total_stok"><strong>Total Stok</strong></label>
														<input type="number" name="total_stok" placeholder="Masukkan Total Stok" autocomplete="off" class="form-control" required>
													</div>
													<!-- <div class="form-group col-md-6">
														<label for="tipe_barang"><strong>Tipe Barang</strong></label>
														<select name="tipe_barang" id="tipe_barang" class="form-control" required>
															<option value="">Pilih Tipe Barang</option>
															<option value="-">-</option> 
															<option value="assembly">Assembly</option> 
															<option value="set kaki">Set Kaki</option> 
															<option value="elektro">Elektro</option> 
															<option value="packing">Packing</option> 
															<option value="material">Material</option> 
															<option value="tiang">Tiang</option> 
														</select>
													</div>  -->
													<div class="form-group col-md-6">
														<label for="jenis_komponen"><strong>Jenis Komponen</strong></label>
														<select name="jenis_komponen" id="jenis_komponen" class="form-control" required>
															<option value="">Pilih Jenis Komponen</option>
															<option value="perekat">Perekat</option>
															<option value="baut_mur">Baut dan Mur</option>
															<option value="raw_material">Raw Material</option>
															<option value="komponen_elektro">Komponen Elektro</option>
															<option value="komponen_mekanik">Komponen Mekanik</option>
															<option value="setjadi_pemesinan">SetJadi dan Proses Pemesinan</option>
															<option value="percetakan_pengecatan">Percetakan, Pengecatan, dan Cairan</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<!-- <div class="form-group col-md-6">
														<label for="harga_satuan"><strong>Harga Satuan</strong></label>
														<input type="text" name="harga_satuan" placeholder="Masukkan Harga Satuan" autocomplete="off" class="form-control" required>
													</div> -->

												</div>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="keterangan"><strong>Keterangan</strong></label>
														<input type="text" name="keterangan" placeholder="Masukkan Keterangan" autocomplete="off" class="form-control" required>
													</div>

													<div class="form-group col-md-6">
														<label for="kebutuhan"><strong>Kebutuhan Alat</strong></label>
														<select name="kebutuhan" id="kebutuhan" class="form-control" required>
															<option value="">Pilih Kebutuhan Alat</option>
															<option value="pasien_monitor">Pasien Monitor</option>
															<option value="tensi_meter">Tensi Meter</option>
															<option value="endoscopy">Endoscopy</option>
															<option value="dental">Dental</option>
															<option value="hnfc">HFNC</option>
															<option value="syringe_pump">Syringe Pump</option>
															<option value="infuse_pump">Infuse Pump</option>
															<option value="usg">USG</option>
														</select>
													</div>

													<!-- <div class="form-group col-md-6">  -->
													<!-- <label for="kebutuhan"><strong>Kebutuhan Alat</strong></label><br/> -->

													<!-- Checkbox untuk alat endoscopy -->
													<!-- <div class="checkbox">
															<?php echo form_checkbox('kebutuhan[]', 'Endoscopy', FALSE, 'id="endoscopy"'); ?>
															<?php echo form_label('Endoscopy', 'endoscopy'); ?>
														</div> -->

													<!-- Checkbox untuk alat antropometri -->
													<!-- <div class="checkbox">
															<?php echo form_checkbox('kebutuhan[]', 'Antropometri', FALSE, 'id="antropometri"'); ?>
															<?php echo form_label('Antropometri', 'antropometri'); ?>
														</div> -->

													<!-- Checkbox untuk alat dental -->
													<!-- <div class="checkbox">
															<?php echo form_checkbox('kebutuhan[]', 'Dental', FALSE, 'id="dental"'); ?>
															<?php echo form_label('Dental', 'dental'); ?>
														</div> -->

													<!-- Checkbox untuk alat lightsource -->
													<!-- <div class="checkbox">
															<?php echo form_checkbox('kebutuhan[]', 'Lightsource', FALSE, 'id="lightsource"'); ?>
															<?php echo form_label('Lightsource', 'lightsource'); ?>
														</div> -->

													<!-- Checkbox untuk alat Suction Irigation -->
													<!-- <div class="checkbox">
															<?php echo form_checkbox('kebutuhan[]', 'Suction Irigation', FALSE, 'id="SuctionIrigation"'); ?>
															<?php echo form_label('Suction Irigation', 'SuctionIrigation'); ?>
														</div>  -->
													<!-- Checkbox untuk alat Trolly endoscopy -->
													<!-- <div class="checkbox">
															<?php echo form_checkbox('kebutuhan[]', 'Trolly Endoscopy', FALSE, 'id="TrollyEndoscopy"'); ?>
															<?php echo form_label('Trolly Endoscopy', 'TrollyEndoscopy'); ?>
														</div> -->
													<!-- Checkbox untuk alat HFNC -->
													<!-- <div class="checkbox">
															<?php echo form_checkbox('kebutuhan[]', 'Hnfc', FALSE, 'id="Hnfc"'); ?>
															<?php echo form_label('Hfnc', 'Hnfc'); ?>
														</div> -->
													<!-- Checkbox untuk Camera system endoscopy -->
													<!-- <div class="checkbox">
															<?php echo form_checkbox('kebutuhan[]', 'Camera System Endoscopy', FALSE, 'id="CameraSystemEndoscopy"'); ?>
															<?php echo form_label('Camera System Endoscopy', 'CameraSystemEndoscopy'); ?>
														</div> -->
													<!-- </div> -->

												</div>
												<div class="form-row">
													<!-- <div class="form-group col-md-6">
														<label for="nama_toko"><strong>Nama Toko</strong></label>
														<input type="text" name="nama_toko" placeholder="Masukkan nama_toko" autocomplete="off" class="form-control" required>
													</div>  -->

													<div class="form-group col-md-6">
														<label for="keterangan_barang"><strong>Keterangan Barang</strong></label>
														<select name="keterangan_barang" id="keterangan_barang" class="form-control" required>
															<option value="">Pilih Keterangan Barang</option>
															<option value="local">local</option>
															<option value="import">import</option>
														</select>
													</div>

													<div class="form-group col-md-6">
														<label for="turunan_alat"><strong>Turunan Alat</strong></label>
														<input type="text" name="turunan_alat" placeholder="Masukkan Turunan Alat" autocomplete="off" class="form-control" required>
													</div>

												</div>


												<!-- <input type="hidden" name="id_barang" value="1">
												<input type="hidden" name="stok_alat" value="HFNC">  -->
											</div>
											<!-- /.card-body -->

											<div class="card-footer">
												<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
												<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
											</div>
										</form>
									</div>
									<!-- /.card -->
									<!-- /.card -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div>
						<!-- /.table karyawan -->
					</div>
				</div>
				<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->





	</div>
	<!-- /.content-wrapper -->
	<?php $this->load->view("partials/footer"); ?>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- DataTables  & Plugins -->
	<script src="<?= base_url() ?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url() ?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url() ?>assets/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/template/plugins/jszip/jszip.min.js"></script>
	<script src="<?= base_url() ?>assets/template/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="<?= base_url() ?>assets/template/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="<?= base_url() ?>assets/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="<?= base_url() ?>assets/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="<?= base_url() ?>assets/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>assets/template/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= base_url() ?>assets/template/dist/js/demo.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?= base_url() ?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

	<!-- JavaScript untuk Menyesuaikan Kode Komponen -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#jenis_komponen').change(function() {
				var selectedValue = $(this).val();
				$.ajax({
					url: "<?php echo base_url('GudangBahanRM/DataMaster/getNextCode'); ?>",
					type: "POST",
					data: {
						'jenis_komponen': selectedValue
					},
					success: function(response) {
						$('#kode_komponen').val(response);
					}
				});
			});
		});
	</script>


</body>

</html>