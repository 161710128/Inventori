<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $titleHead ?> - <?= $penerimaan->tanggal ?></title>

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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
	  <div class="float-right">
 						<a href="<?= base_url('Packing/PengirimanBarang') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
        <div class="row mb-2">
          	<div class="col-sm-6"> 
            	<h1 class="m-0"><?= $title?></h1>
			</div>
          <!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
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
		<div class="card">
					<div class="card-header">
            <strong><?= $title ?> - <?= $penerimaan->kode_transaksi ?></strong>
            <!-- <div class="float-right">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tampilkan Data</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"> 
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">All</a></li>    
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail_standingWeight/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">Standing Weight</a></li>    
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail_babyScale/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">Baby Scale</a></li>    
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail_stadioMeter/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">Stadio Meter</a></li>    
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail_infantoMeter/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">Infanto Meter</a></li>    
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail_lila/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">Lila</a></li>    
              </ul>
            </div> -->
          </div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<table class="table table-borderless">
									<tr>
										<td><strong>No Transaksi</strong></td>
										<td>:</td>
										<td><?= $penerimaan->kode_transaksi ?></td>
									</tr>
									<tr>
										<td><strong>Nama Petugas</strong></td>
										<td>:</td>
										<td><?= $penerimaan->nama_pengguna ?></td>
									</tr>
									<tr>
										<td><strong>Tanggal Transaksi</strong></td>
										<td>:</td>
										  <!-- <td><?= $penerimaan->tanggal ?> - <?= $penerimaan->jam ?></td> -->
										<?php 
										  $originalDate = $penerimaan->tanggal;
										  $newDate = date("d/m/Y", strtotime($originalDate));
										?>
										<td> 
										  <?=  $newDate ?>
										</td>
														</tr>
													</table>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<table class="table table-bordered" id="example1" class="table table-bordered table-striped">
														<thead>
															<tr>
															  <th><strong>No</strong></th> 
															  <th><strong>Kode Alat</strong></th>
															  <th><strong>Serial Number</strong></th>
															  <th><strong>Nama Alat</strong></th>
															  <th><strong>Jumlah</strong></th> 
															  <th><strong>Catatan</strong></th>
															  <th><strong>Nama Shift</strong></th> 
															  <th><input type="checkbox" class="ceklis-checkbox-header" id="ceklis-header"></th>
															  </tr>
																			</thead>
																			<tbody>
																				<?php foreach ($all_detail_terima as $detail_terima): ?>
																					<tr>
																						<td><?= $no++ ?></td> 
																						<td><?= $detail_terima->kode_alat ?></td>
																						<td><?= $detail_terima->serial_number ?></td> 
																						<td><?= $detail_terima->nama_alat ?></td> 
																						<td><?= $detail_terima->total_stok ?></td>  
																						<td><?= $detail_terima->catatan ?></td> 
																						<td><?= $detail_terima->nama_shift ?></td>
																						<!-- <td><a href="<?= base_url('Packing/PengirimanBarang/detailHapus/' . $detail_terima->id_detail) ?>"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
																						<a href="<?= base_url('Packing/PengirimanBarang/tambahDataKeTable2/' . $detail_terima->id_detail) ?>"  class="btn btn-success btn-sm"><i class="fa fa-undo"></i> </a> -->
																						<td><!--<a href="<?= base_url('Packing/PengirimanBarang/detailKembalikan/' . $detail_terima->id_detail) ?>"  class="btn btn-success btn-sm"><i class="fa fa-undo"></i></a>-->
																						
																						<input type="checkbox" class="ceklis-checkbox" data-kode="<?= $detail_terima->kode_alat ?>" data-id="<?= $detail_terima->id_detail ?>"> Batal Kirim																						</td>
																

																					</tr>
																				<?php endforeach ?>
																			</tbody>
																			<tfoot>
															<tr>
															  <th><strong>No</strong></th> 
															  <th><strong>Kode Alat</strong></th>
															  <th><strong>Serial Number</strong></th>
															  <th><strong>Nama Alat</strong></th>
															  <th><strong>Jumlah</strong></th> 
															  <th><strong>Catatan</strong></th>
															  <th><strong>Nama Shift</strong></th> 
															  <th><strong></strong></th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
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

<script>


 $(document).ready(function() {
	 
		 $('#ceklis-header').change(function() {
				var isChecked 		= $(this).prop('checked'); // Mendapatkan status centang checkbox
				var kodeTransaksi 	= $('input[name="kode_transaksi"]').val();
				var selectedIds 	= []; // Array untuk menyimpan id_detail yang dicentang
				var selectedKode 	= [];
				// Perbarui semua checkbox di tubuh tabel
				$('.ceklis-checkbox').prop('checked', isChecked);

				// Kumpulkan id_detail dari semua checkbox yang dicentang
				$('.ceklis-checkbox:checked').each(function() {
					var idDetail = $(this).data('id');
					selectedIds.push(idDetail);
					var kodeAlat = $(this).data('kode');
					selectedKode.push(kodeAlat);
				});

				// Kirim permintaan Ajax jika checkbox di header dicentang
				$.ajax({
					url: '<?= base_url('Packing/PengirimanBarang/hapusKeteranganBatch') ?>', // Ganti dengan URL yang sesuai
					method: 'POST',
					data: { id_detail: selectedIds,kode_alat: selectedKode, keterangan: '', kode_transaksi: kodeTransaksi },
					success: function(response) {
						// Tangani respons dari server jika perlu
						console.log('Keterangan berhasil diperbarui');
						
						// Sembunyikan baris yang dicentang
						$('.ceklis-checkbox:checked').closest('tr').fadeOut('slow', function() {
							$(this).remove();
						});
					},
					error: function() {
						// Tangani kesalahan jika perlu
						console.log('Terjadi kesalahan saat mengirim permintaan');
					}
				});
			});
			
			$('.ceklis-checkbox').change(function() {
				var isChecked 		= $(this).prop('checked'); // Mendapatkan status centang checkbox
				var idDetail 		= $(this).data('id'); // Mendapatkan id_detail dari atribut data
				var kodeAlat 		= $(this).data('kode'); 				// Mendapatkan id_detail dari atribut data
				var kodeTransaksi 	= $('input[name="kode_transaksi"]').val();

				// Simpan referensi checkbox dalam variabel
				var $checkbox = $(this);

				// Kirim permintaan Ajax jika checkbox di dalam tubuh tabel dicentang
				$.ajax({
					url: '<?= base_url('Packing/PengirimanBarang/hapusKeterangan') ?>', // Ganti dengan URL yang sesuai
					method: 'POST',
					data: { id_detail: idDetail, kode_alat : kodeAlat, keterangan: '', kode_transaksi: kodeTransaksi },
					success: function(response) {
						// Tangani respons dari server jika perlu
						console.log('Keterangan berhasil diperbarui');
						// Sembunyikan baris yang dicentang
						$checkbox.closest('tr').fadeOut('slow', function() {
							$(this).remove();
						});
					},
					error: function() {
						// Tangani kesalahan jika perlu
						console.log('Terjadi kesalahan saat mengirim permintaan');
					}
				});
			});
				
			// $('.ceklis-checkbox, .ceklis-checkboxx').change(function() {
				// var isChecked = $(this).prop('checked'); // Mendapatkan status centang checkbox
				// var idDetail = $(this).data('id'); // Mendapatkan id_detail dari atribut data


				// // Periksa apakah checkbox yang dicentang adalah checkbox di header atau bukan
				// if ($(this).hasClass('ceklis-checkbox')) {
					// var row = $(this).closest('tr'); // Temukan baris yang berisi checkbox yang dicentang

					// if (!row.hasClass('ceklis-header')) {
						// // Kirim permintaan Ajax jika checkbox di dalam tubuh tabel dicentang
						// row.fadeOut('slow', function() {
							// // Setelah animasi selesai, hapus baris dari tampilan
							// row.remove();
						// });

						// // Kirim permintaan Ajax jika checkbox di header dicentang
						// $.ajax({
							// url: '<?= base_url('Packing/PengirimanBarang/hapusKeterangan') ?>', // Ganti dengan URL yang sesuai
							// method: 'POST',
							// data: { id_detail: idDetail, keterangan: '' },
							// success: function(response) {
								// // Tangani respons dari server jika perlu
								// console.log('Keterangan berhasil diperbarui');
							// },
							// error: function() {
								// // Tangani kesalahan jika perlu
								// console.log('Terjadi kesalahan saat mengirim permintaan');
							// }
						// });
					// }
				// } else if ($(this).hasClass('ceklis-checkboxx')) {
					// // Tangani checkbox di header di sini jika perlu
					// // ...
				// }
			// });	

			
			
			$('.ceklis-button').click(function() {
				$(this).text('✓'); 
				// Mengubah teks tombol menjadi tanda centang (✓)
			});
			
}) 

			
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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