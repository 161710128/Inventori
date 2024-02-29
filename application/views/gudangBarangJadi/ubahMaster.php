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
							<a href="<?= base_url('GudangBarangJadi/DataMaster') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
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
										<form action="<?= base_url('GudangBarangJadi/DataMaster/proses_ubah/' . $barang->kode_komponen) ?>" id="form-tambah" method="POST">
											<div class="card-body">
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="kode_komponen"><strong>Kode Komponen</strong></label>
														<input type="text" name="kode_komponen" id="kode_komponen" placeholder="Kode Komponen" autocomplete="off" class="form-control" value="<?= $barang->kode_komponen ?>" required readonly>
													</div>
													<div class="form-group col-md-6">
														<label for="keterangan_kode"><strong>Keterangan Kode</strong></label>
														<input type="text" name="keterangan_kode" placeholder="Masukkan Keterangan Kode" autocomplete="off" class="form-control" value="<?= $barang->keterangan_kode ?>" required>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="nama_komponen"><strong>Nama Barang</strong></label>
														<input type="text" name="nama_komponen" placeholder="Masukkan Nama Komponen" autocomplete="off" class="form-control" value="<?= $barang->nama_komponen ?>" required>
													</div>
													<div class="form-group col-md-6">
														<label for="gambar_komponen"><strong>Unggah Gambar Komponen</strong></label>
														<input type="file" name="gambar_komponen" accept="image/*" class="form-control-file" required>
													</div> 
												</div>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="spesifikasi"><strong>Spesifikasi</strong></label>
														<input type="text" name="spesifikasi" placeholder="Masukkan Spesifikasi" autocomplete="off" class="form-control" value="<?= $barang->spesifikasi ?>" required>
													</div> 
													<div class="form-group col-md-6">
														<label for="qty_unit"><strong>QTY / Unit</strong></label>
														<input type="text" name="qty_unit" placeholder="Masukkan QTY/Unit" autocomplete="off" class="form-control" value="<?= $barang->qty_unit?>" required>
													</div>  
												</div>
												<div class="form-row"> 
												<div class="form-group col-md-6">
														<label for="stok_minimal"><strong>Stok Minimal</strong></label>
														<input type="number" name="stok_minimal" placeholder="Masukkan Stok Minimal" autocomplete="off" class="form-control" value="<?= $barang->stok_minimal?>" required>
													</div>
													<div class="form-group col-md-6">
														<label for="satuan"><strong>Satuan</strong></label>
														<select name="satuan" id="satuan" class="form-control" required>
															<option value="">Pilih Satuan</option>
															<option value="liter" <?= $barang->satuan == 'liter' ? 'selected' : '' ?>>Liter</option>
															<option value="meter" <?= $barang->satuan == 'meter' ? 'selected' : '' ?>>Meter</option>
															<option value="rol" <?= $barang->satuan == 'rol' ? 'selected' : '' ?>>Rol</option>
															<option value="pcs" <?= $barang->satuan == 'pcs' ? 'selected' : '' ?>>Pcs</option>  
															<option value="batang" <?= $barang->satuan == 'batang' ? 'selected' : '' ?>>Batang</option>  
															<option value="lembar" <?= $barang->satuan == 'lembar' ? 'selected' : '' ?>>Lembar</option>  
														</select>
													</div>
												</div>
												<div class="form-row"> 
													<div class="form-group col-md-6">
														<label for="total_stok"><strong>Total Stok</strong></label>
														<input type="number" name="total_stok" placeholder="Masukkan Total Stok" autocomplete="off" class="form-control" value="<?= $barang->total_stok?>" required>
													</div> 
													<div class="form-group col-md-6">
														<label for="tipe_barang"><strong>Tipe Barang</strong></label>
														<select name="tipe_barang" id="tipe_barang" class="form-control" required>
															<option value="">Pilih Kebutuhan</option>
															<option value="-" <?= $barang->type_barang == '-' ? 'selected' : '' ?>>-</option>
															<option value="assembly" <?= $barang->type_barang == 'assembly' ? 'selected' : '' ?>>Assembly</option>
															<option value="set kaki" <?= $barang->type_barang == 'set kaki' ? 'selected' : '' ?>>Set Kaki</option>
															<option value="elektro" <?= $barang->type_barang == 'elektro' ? 'selected' : '' ?>>Elektro</option>
															<option value="packing" <?= $barang->type_barang == 'packing' ? 'selected' : '' ?>>Packing</option>  
															<option value="material" <?= $barang->type_barang == 'material' ? 'selected' : '' ?>>Material</option>  
															<option value="tiang" <?= $barang->type_barang == 'tiang' ? 'selected' : '' ?>>Tiang</option> 
														</select> 
													</div> 
												</div>  
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="harga_satuan"><strong>Harga Satuan</strong></label>
														<input type="text" name="harga_satuan" placeholder="Masukkan Harga Satuan" autocomplete="off" class="form-control" value="<?= $barang->harga_satuan ?>" required>
													</div>
													<div class="form-group col-md-6">
														<label for="jenis_komponen"><strong>Jenis Komponen</strong></label>
														<select name="jenis_komponen" id="jenis_komponen" class="form-control" required>
															<option value="">Pilih Jenis Komponen</option>
															<option value="Import" <?= $barang->jenis_komponen == 'Import' ? 'selected' : '' ?>>Import</option> 
															<option value="Ent/THT" <?= $barang->jenis_komponen == 'Ent/THT' ? 'selected' : '' ?>>Ent/THT</option>  
															<option value="Hysteroscopy" <?= $barang->jenis_komponen == 'Hysteroscopy' ? 'selected' : '' ?>>Hysteroscopy</option>   
															<option value="Laparoscopy" <?= $barang->jenis_komponen == 'Laparoscopy' ? 'selected' : '' ?>>Laparoscopy</option>  
															<option value="Electric hysteria cutter(morcellator)" <?= $barang->jenis_komponen == 'Electric hysteria cutter(morcellator)' ? 'selected' : '' ?>>Electric hysteria cutter(morcellator)</option>   
															<option value="Vats video Assisted thoracoscopy" <?= $barang->jenis_komponen == 'Vats video Assisted thoracoscopy' ? 'selected' : '' ?>>Vats video Assisted thoracoscopy</option>   
															<option value="Arthroscpoy" <?= $barang->jenis_komponen == 'Arthroscpoy' ? 'selected' : '' ?>>Arthroscpoy</option>    
															<option value="Spine" <?= $barang->jenis_komponen == 'Spine' ? 'selected' : '' ?>>Spine</option>     
															<option value="Urology" <?= $barang->jenis_komponen == 'Urology' ? 'selected' : '' ?>>Urology</option>    
															<option value="Endoscopy Scope" <?= $barang->jenis_komponen == 'Endoscopy Scope' ? 'selected' : '' ?>>Endoscopy Scope</option>   
															<option value="Elektronik" <?= $barang->jenis_komponen == 'Elektronik' ? 'selected' : '' ?>>Elektronik</option>    
															<option value="Non Elektronik" <?= $barang->jenis_komponen == 'Non Elektronik' ? 'selected' : '' ?>>Non Elektronik</option>    
															<option value="Stainless" <?= $barang->jenis_komponen == 'Stainless' ? 'selected' : '' ?>>Stainless</option>   
															<option value="Bed" <?= $barang->jenis_komponen == 'Bed' ? 'selected' : '' ?>>Bed</option>  
															<option value="Inventaris" <?= $barang->jenis_komponen == 'Inventaris' ? 'selected' : '' ?>>Inventaris</option>   
															<option value="Barang Jadi" <?= $barang->jenis_komponen == 'Barang Jadi' ? 'selected' : '' ?>>Barang Jadi</option>  
															<option value="Barang Kemas" <?= $barang->jenis_komponen == 'Barang Kemas' ? 'selected' : '' ?>>Barang Kemas</option>   
														</select>
													</div> 
												</div> 
												<div class="form-row">  
													<div class="form-group col-md-6">
														<label for="keterangan"><strong>Keterangan</strong></label>
														<input type="text" name="keterangan" placeholder="Masukkan Keterangan" autocomplete="off" class="form-control" value="<?= $barang->keterangan ?>" required>
													</div>
													<div class="form-group col-md-6">
														<label for="lokasi"><strong>Nama Lokasi</strong></label>
														<input type="text" name="lokasi" placeholder="Masukkan Lokasi" autocomplete="off" class="form-control" value="<?= $barang->lokasi ?>" required>
													</div> 
												</div>
												<div class="form-row">  
													<div class="form-group col-md-6">
														<label for="nama_toko"><strong>Nama Toko</strong></label>
														<input type="text" name="nama_toko" placeholder="Masukkan nama_toko" autocomplete="off" class="form-control" value="<?= $barang->nama_toko ?>" required>
													</div> 
													<div class="form-group col-md-6">
														<label for="keterangan_barang"><strong>Keterangan Barang</strong></label>
														<select name="keterangan_barang" id="keterangan_barang" class="form-control" required>
															<option value="">Pilih Keterangan Barang</option>
															<option value="-" <?= $barang->keterangan_barang == '-' ? 'selected' : '' ?>>-</option>
															<option value="prioritas" <?= $barang->keterangan_barang == 'prioritas' ? 'selected' : '' ?>>Prioritas</option> 
														</select> 
													</div> 
												</div> 
												<div class="form-row">   
												<div class="form-group col-md-6">
													<label for="kebutuhan"><strong>Kebutuhan Alat</strong></label>
													<textarea name="kebutuhan" placeholder="Masukkan Kebutuhan Alat" autocomplete="off" class="form-control" rows="5" cols="50" required><?= $barang->kebutuhan ?></textarea>
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
            $('#GudangBarangJadi').change(function() {
                var selectedValue = $(this).val();
                $.ajax({
                    url: "<?php echo base_url('GudangBarangJadi/DataMaster/getNextCode'); ?>",
                    type: "POST",
                    data: {'GudangBarangJadi': selectedValue},
                    success: function(response) {
                        $('#kode_komponen').val(response);
                    }
                });
            });
        });
    </script>


</body>

</html>
