<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KomponenBarang - <?= $tanggalSekarang ?></title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/aos.css" />
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
					</div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header --> 

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-lg-2 col-4" data-aos="fade-up">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<br>
									<!-- <h3>10</h3> -->
									<h3><?= $jumlah_barang ?></h3>
									<p>Master Barang</p>
								</div>
								<div class="icon">
									<i class="ion ion-briefcase"></i>
								</div>
								<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-2 col-4">
							<!-- small box -->
							<div class="small-box bg-success" data-aos="fade-down">
								<div class="inner">
									<br>
									<h3><?= $jumlah_inventaris ?></h3>
									<p>Master Inventaris</p>
								</div>
								<div class="icon"> 
									<i class="ion ion-briefcase"></i>
								</div>
								<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-2 col-4">
							<!-- small box -->
							<div class="small-box bg-purple" data-aos="fade-right">
								<div class="inner">
									<br>
									<h3><?= $jumlah_penerimaan ?></h3>
									<p>Komponen Barang</p>
								</div>
								<div class="icon">
									<i class="ion ion-archive"></i>
								</div>
								<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						<div class="col-lg-2 col-4">
							<!-- small box -->
							<div class="small-box bg-danger" data-aos="fade-left">
								<div class="inner">
									<br>
									<h3><?= $jumlah_penerimaan_inventaris ?></h3>
									<p>Komponen Inventaris</p>
								</div>
								<div class="icon">
									<i class="ion ion-archive"></i>
								</div>
								<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						<div class="col-lg-2 col-4">
							<!-- small box -->
							<div class="small-box bg-pink" data-aos="fade-up">
								<div class="inner">
									<br>
									<h3><?= $jumlah_pengeluaran ?></h3>
									<p>Komponen Barang</p>
								</div>
								<div class="icon">
									<i class="ion ion-upload"></i>
								</div>
								<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						<div class="col-lg-2 col-4">
							<!-- small box -->
							<div class="small-box bg-lightblue" data-aos="fade-right">
								<div class="inner">
									<br>
									<h3><?= $jumlah_pengeluaran_inventaris ?></h3>
									<p>Barang Inventaris</p>
								</div>
								<div class="icon">
									<i class="ion ion-upload"></i>
								</div>
								<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
					</div>
					<!-- /.row -->
					<!-- Main row -->
					<div class="row" data-aos="fade-up">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<div class="card">
										<!-- <div class="card-header">
                <h3 class="card-title"><?= $title ?></h3> 
              </div> -->
										<div class="card-body">
											<table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Kode Komponen</th>
														<th>Nama komponen</th>
														<th>Spesifikasi</th>
														<th>QTY /Unit</th>
														<th>Harga Satuan</th>
														<th>Satuan</th>
														<th>Total Stok</th>
														<th>Stok Minimal</th>
														<th>Stok Alat</th>
														<th>Nama Toko</th>
														<th>Kebutuhan</th>
														<th>Keterangan</th>
														<th>Tipe Barang</th> 
														<th>Keterangan Stok</th> 
													</tr>
												</thead>
												<tbody>
													<?php foreach ($StokKurang as $barang) : ?>
														<tr>
															<td><?= $no++ ?></td>
															<td><?= $barang->kode_komponen ?></td>
															<td><?= $barang->nama_komponen ?></td>
															<td><?= $barang->spesifikasi ?></td>
															<td><?= $barang->qty_unit ?></td>
															<td><?= rupiah($barang->harga_satuan) ?></td>
															<td><?= strtoupper($barang->satuan) ?></td>
															<td><?= $barang->total_stok ?></td>
															<td><?= $barang->stok_minimal ?></td>
															<td><?= $barang->stok_alat ?></td>
															<td><?= $barang->nama_toko ?></td>
															<td><?= $barang->kebutuhan ?></td>
															<td><?= $barang->keterangan ?></td>
															<td><?= $barang->type_barang ?></td> 
															<td><?= $barang->keterangan_stok ?></td>
														</tr>
													<?php endforeach ?>
												</tbody>
												<tfoot>
													<tr>
														<th>No</th>
														<th>Kode Komponen</th>
														<th>Nama komponen</th>
														<th>Spesifikasi</th>
														<th>QTY /Unit</th>
														<th>Harga Satuan</th>
														<th>Satuan</th>
														<th>Total Stok</th>
														<th>Stok Minimal</th>
														<th>Stok Alat</th>
														<th>Nama Toko</th>
														<th>Kebutuhan</th>
														<th>Keterangan</th>
														<th>Tipe Barang</th> 
														<th>Keterangan Stok</th> 
													</tr>
												</tfoot>
											</table>
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

	<script src="<?= base_url() ?>assets/dist/aos.js"></script>
	<script>
		AOS.init({
			easing: 'ease-in-out-sine'
		});
	</script>

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
