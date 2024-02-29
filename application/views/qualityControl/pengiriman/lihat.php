<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Master Barang</title>

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
      </li> -->

			</ul>

			<!-- SEARCH FORM -->
			<form class="form-inline ml-3">
			</form>
			<ul class="navbar-nav ml-auto">
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
							<!-- <h3 class="card-title float-right"><a href="<?= base_url('QualityControl/PengirimanEkatalog/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></h3> -->
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
									    <div class="card-header">
											<h3 class="card-title">
												<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tampilkan Data</a>
												<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
													<li><a href="<?= base_url('QualityControl/PengirimanEkatalog') ?>" class="dropdown-item">All</a></li>
													<li><a href="<?= base_url('QualityControl/PengirimanEkatalog/antropometri') ?>" class="dropdown-item">Antropometri</a></li>
													<li><a href="<?= base_url('QualityControl/PengirimanEkatalog/lanKP') ?>" class="dropdown-item">Lansia Kit & Posyandu</a></li> 
													<li><a href="<?= base_url('QualityControl/PengirimanEkatalog/endosLL') ?>" class="dropdown-item">Endoskopi, Laparoskopi & Lightsouce</a></li>
													<li><a href="<?= base_url('QualityControl/PengirimanEkatalog/infusSP') ?>" class="dropdown-item">Infusepump, Syringepump & Pasienmonitor</a></li>
													<li><a href="<?= base_url('QualityControl/PengirimanEkatalog/hfnc') ?>" class="dropdown-item">HFNC</a></li> 
													<li><a href="<?= base_url('QualityControl/PengirimanEkatalog/usg') ?>" class="dropdown-item">USG</a></li> 
													<li><a href="<?= base_url('QualityControl/PengirimanEkatalog/dexin') ?>" class="dropdown-item">Dexin</a></li> 
												</ul>
											</h3>
											<!-- <h3 class="card-title float-right"><a href="<?= base_url('BarangElektro/tambahhfnc') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></h3> -->
										</div>
										<div class="card-body">
											<table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr>
														<th><strong>No</strong></th>
														<th><strong>Kode Pemesanan</strong></th>
														<th><strong>ID Paket</strong></th>
														<th><strong>Pemesanan</strong></th>
														<th><strong>Distributor</strong></th>
														<th><strong>Nama Alat</strong></th>
														<th><strong>Quantity</strong></th>
														<th><strong>Tanggal Deadline Kontrak</strong></th> 
														<th><strong>Tanggal Dikirim</strong></th> 
														<th><strong>Catatan</strong></th> 
														<th><strong>Nama Barang</strong></th> 
														<!-- <th><strong>Satatus</strong></th>  -->
														<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($all_barang as $barang) : ?>
														<tr>
															<?php 
																$originalDate = $barang->tanggal_deadline;
																$newDate = date("d/m/Y", strtotime($originalDate));
																$originalDate1 = $barang->tanggal_dikirim;

																if (!empty($originalDate1 && $originalDate1 != '0000-00-00')) 
																{
																	$newDate1 = date("d/m/Y", strtotime($originalDate1));
																} else { 
																		$newDate1 = '-';
																}
																
															?>
															<td><?= $no++ ?></td>
															<td><?= $barang->kode_pemesanan ?></td> 
															<td><?= $barang->id_paket ?></td> 
															<td><?= $barang->pemesanan ?></td>   
															<td><?= $barang->distributor ?></td>   
															<td><?= $barang->nama_alat ?></td>   
															<td><?= $barang->qty ?></td>    
															<td><?= $newDate ?></td>   
															<td><?= $newDate1 ?></td>   
															<td><?= $barang->catatan ?></td>   
															<td><?= $barang->nama_barang ?></td>     
															<!-- <td><?= $barang->status ?></td>      -->
															<td>
																<?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'quality') : ?>
																	<a href="<?= base_url('QualityControl/PengirimanEkatalog/ubah/' . $barang->kode_pemesanan) ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
																	<!-- <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('QualityControl/PengirimanEkatalog/hapus/' . $barang->kode_pemesanan) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
																<?php endif; ?>
															</td>
														</tr>
													<?php endforeach ?> 
												</tbody>
												<tfoot>
													<tr>
														<th><strong>No</strong></th>
														<th><strong>Kode Pemesanan</strong></th>
														<th><strong>ID Paket</strong></th>
														<th><strong>Pemesanan</strong></th>
														<th><strong>Distributor</strong></th>
														<th><strong>Nama Alat</strong></th>
														<th><strong>Quantity</strong></th>
														<th><strong>Tanggal Deadline Kontrak</strong></th> 
														<th><strong>Tanggal Dikirim</strong></th> 
														<th><strong>Catatan</strong></th> 
														<th><strong>Nama Barang</strong></th> 
														<!-- <th><strong>Status</strong></th>  -->
														<th></th>
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
