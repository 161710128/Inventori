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
					<div class="row mb-2">
						<div class="col-sm-6">
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
						<!-- <div class="col-sm-6">
							<h1 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a style="margin-left: 285px" href="<?= base_url('PengeluaranInventeris_Mekanik') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
							</h1>
						</div> -->
					</div>
					<!-- /.row -->
					<!-- <hr> -->
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

											<div class="card-header"><strong><?= $title ?> - <?= $pengeluaran->kode_transaksi ?></strong>
												<div class="float-right"><a href="<?= base_url('GudangBahanRM/Pengeluaran') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></div>

											</div>
											
											<div class="card-body">
												<!-- <div class="float-right">
													<a href="<?= base_url('PengeluaranInventeris_Mekanik/export_detail/' . $pengeluaran->kode_transaksi) ?>" class="btn btn-danger btn-sm" target="_blank"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
													<a href="<?= base_url('PengeluaranInventeris_Mekanik') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
												</div> -->
												<div class="row">
													<div class="col-md-6">
														<table class="table table-borderless">
															<tr>
																<td><strong>No Keluar</strong></td>
																<td>:</td>
																<td><?= $pengeluaran->kode_transaksi ?></td>
															</tr>
															<tr>
																<td><strong>Nama Pengguna</strong></td>
																<td>:</td>
																<td><?= $pengeluaran->nama_pengguna ?></td>
															</tr>
															<!-- <tr>
																<td><strong>Waktu Keluar</strong></td>
																<td>:</td>
																<td><?= $pengeluaran->tanggal_keluar ?> - <?= $pengeluaran->jam_keluar ?></td>
															</tr> -->
														</table>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-md-12">
														<table id="example1" class="table table-bordered table-striped">
															<thead>
																<tr>
																	<td><strong>No</strong></td>
																	<td><strong>Nama Komponen</strong></td>
																	<td><strong>Spesifikasi</strong></td>
																	<td><strong>Jumlah</strong></td>
																	<td><strong>Peruntukan</strong></td>
																	<td><strong>Nama Pengambil</strong></td>
																	<td><strong>Shift</strong></td>
																	<td><strong>Waktu Keluar</strong></td>
																	<td><strong>Aksi</strong></td>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($all_detail_keluar as $detail_keluar) : ?>
																	<tr>
																		<td><?= $no++ ?></td>
																		<td><?= $detail_keluar->nama_komponen ?></td>
																		<td><?= $detail_keluar->spesifikasi ?></td>
																		<td><?= $detail_keluar->jumlah ?> <?= strtoupper($detail_keluar->satuan) ?></td>
																		<td><?= $detail_keluar->peruntukan ?></td>
																		<td><?= $detail_keluar->pengambil ?></td>
																		<td><?= $detail_keluar->shift ?></td> 
        																<?php 
        																	$originalDate = $detail_keluar->tanggal;
        																	$newDate = date("d/m/Y", strtotime($originalDate));
        																?>
            															<td><?= $newDate?></td> 
																		<td><a href="<?= base_url('GudangBahanRM/Pengeluaran/detailHapus/' . $detail_keluar->id_detail) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
																	</tr>
																<?php endforeach ?>
															</tbody>
															<tfoot>
																<tr>
																	<td><strong>No</strong></td>
																	<td><strong>Nama Komponen</strong></td>
																	<td><strong>Spesifikasi</strong></td>
																	<td><strong>Jumlah</strong></td>
																	<td><strong>Peruntukan</strong></td>
																	<td><strong>Nama Pengambil</strong></td>
																	<td><strong>Shift</strong></td>
																	<td><strong>Waktu Keluar</strong></td>
																	<td><strong>Aksi</strong></td>
																</tr>
																</tfoot>
														</table>
													</div>
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
