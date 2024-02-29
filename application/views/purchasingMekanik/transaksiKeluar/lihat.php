<!DOCTYPE html>
<html lang="en"> 
<head>




	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard | Mekanik</title>

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

</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
     --> 
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
					<div class="row mb-2">
						<div class="col-sm-12">
						<h3 class="card-title float-right"><a href="<?= base_url('PurchasingMekanik/PengeluaranMekanik/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></h3>
							<h1 class="m-0"><?= $title ?></h1>
						</div>
						<!-- /.col -->
						<!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Mekanik</li>
            </ol>
          </div> -->
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
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
								<div class="col-12">
									<div class="card">
										<!-- <div class="card-header">
                <h3 class="card-title"><?= $title ?></h3> 
              </div> -->
										<div class="card shadow">

											<!-- <div class="card-header"> -->
												<!-- <strong>Daftar Pengeluaran</strong> -->
												<!-- <h3 class="card-title">
													<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tampilkan Data</a>
													<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"> -->
														<!-- <li><a href="<?= base_url('PurchasingMekanik/BarangMekanik') ?>" class="dropdown-item">All</a></li> -->
														<!-- <li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/hfnc') ?>" class="dropdown-item">HFNC</a></li> -->
														<!-- <li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/inventaris') ?>" class="dropdown-item">Inventaris</a></li> -->
														<!-- <li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/tensiMeter') ?>" class="dropdown-item">Tensi Meter</a></li>
														<li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/bahanMaterial') ?>" class="dropdown-item">Bahan material</a></li>
														<li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/riset') ?>" class="dropdown-item">Riset</a></li>
														<li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/dentalDexin') ?>" class="dropdown-item">Dental dexin</a></li>
														<li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/pasienMonitor') ?>" class="dropdown-item">Pasien Monitor</a></li>
														<li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/hospitalBed') ?>" class="dropdown-item">Hospital Bed</a></li>
														<li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/cameraSystemFHD') ?>" class="dropdown-item">Camera System Full HD</a></li>
														<li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/APJS') ?>" class="dropdown-item">APJS</a></li>
														<li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/infuseSyiringe') ?>" class="dropdown-item">Infuse dan Syiringe</a></li>
														<li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/dentalWRM') ?>" class="dropdown-item">Dental Whitening Resin Mode</a></li>
														<li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/dentalW3DP') ?>" class="dropdown-item">Dental Whitening 3D Print</a></li>
														<li><a href="<?= base_url('PurchasingMekanik/BarangMekanik/summitAerosol') ?>" class="dropdown-item">Summit Aerosol</a></li>
													</ul>
												</h3>  -->
												<!-- <h3 class="card-title float-right"><a href="<?= base_url('PurchasingMekanik/PengeluaranMekanik/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></h3> -->
											<!-- </div> -->

											<div class="card-body">

												<div class="table-responsive">
													<!-- <div class="float-right">
														<a href="<?= base_url('PurchasingMekanik/PengeluaranMekanik/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
													</div> -->
													<table class="table table-bordered" id="example1" width="100%" cellspacing="0">
														<thead>
															<tr>
																<td>No</td>
																<td>Kode Transaksi</td>
																<td>Nama Pengguna</td>
																<td>Tanggal Keluar</td>
																<td></td>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($all_pengeluaran as $pengeluaran) : ?>
																<tr>
																	<td><?= $no++ ?></td>
																	<td><?= $pengeluaran->kode_transaksi ?></td>
																	<td><?= $pengeluaran->nama_pengguna ?></td>
																	<!--<td><?= $pengeluaran->tanggal_keluar ?> <?= $pengeluaran->jam_keluar ?></td> -->
																	
    																<?php 
    																	$originalDate = $pengeluaran->tanggal_keluar;
    																	$newDate = date("d/m/Y", strtotime($originalDate));
    																?>
															        <td><?= $newDate?></td>
																	
																	
																	
																	<td>
																		<a href="<?= base_url('PurchasingMekanik/PengeluaranMekanik/detail/' . $pengeluaran->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
																		<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik'|| $this->session->login['role'] == 'supervisor') : ?>
																			<!-- <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('PurchasingMekanik/PengeluaranMekanik/hapus/' . $pengeluaran->kode_transaksi) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
																		<?php endif; ?>
																		<a href="<?= base_url('PurchasingMekanik/PengeluaranMekanik/ubah/' . $pengeluaran->kode_transaksi) ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
																	</td>
																</tr>
															<?php endforeach ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<!-- /.card-body -->
									</div>
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

	<script>
		$(function() {
			$("#example1").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
	</script>

</body>

</html>
