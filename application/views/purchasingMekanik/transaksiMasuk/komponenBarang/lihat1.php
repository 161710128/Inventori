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
							<!-- <?php if ($all_test == $all_test1) : ?> 
									
							<?php else  : ?>
								<h3 class="card-title float-right"><a href="<?= base_url('PurchasingMekanik/PenerimaanMekanik/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></h3>
							<?php endif; ?>  -->
							<h1 class="m-0"><?= $title?></h1> 
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
											<div class="card-title float-left"><strong>Daftar Transaksi Masuk </strong></div>
											<h3 class="card-title float-right"><a href="<?= base_url('PurchasingMekanik/PenerimaanMekanik/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></h3>
										</div> -->
											<?php
												$conn = mysqli_connect('localhost', 'root', 'gerlinkju@r@', 'test');
												$query = mysqli_query($conn, "SELECT * FROM tbl_mergecell ORDER BY kode_diagnosa");
												$arr1 = array();
												
												while ($row  = mysqli_fetch_object($query)) {
													$arr1[$row->kode_diagnosa][] = $row;
												} 
												// print_r($arr1);
											?> 

										<div class="card-body">
											<table id="example1" class="table table-bordered table-striped"> 
											<thead>
												<tr>
													<th>Kode Diagnosa</th>
													<th>Kode Gejala</th>  
													<th>Aksi</th>
												</tr>
											</thead>	
											<tbody> 
												<?php foreach ($arr1 as $key => $val) : ?>
													<tbody>
														<?php foreach ($val as $k => $v) : ?>
															<tr>
																<?php if ($k == 0) : ?>
																	<td rowspan="<?php echo count($val) ?>">
																		<?php echo $v->kode_diagnosa ?>
																	</td>
																<?php endif ?>
																<td><?php echo $v->kode_gejala ?></td>  
																<td><a href="<?= base_url('PurchasingMekanik/PenerimaanMekanik/ubah/' . $v->id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a></td>
															</tr>
														<?php endforeach ?>
													</tbody>
													
												<?php endforeach ?> 
											</tbody>
											<tfoot>
												<tr>
													<th>Kode Diagnosa</th>
													<th>Kode Gejala</th> 
													<!-- <th></th> -->
													<th>Aksi</th>
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
