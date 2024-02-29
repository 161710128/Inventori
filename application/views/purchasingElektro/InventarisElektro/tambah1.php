<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah</title>

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
        <div class="row mb-2">
		<div class="col-sm-12">
		  <div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('PurchasingElektro/InventarisElektro') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
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
		<div id="content-wrapper" class="d-flex flex-column">
		<div id="content" data-url="<?= base_url('PurchasingElektro/InventarisElektro') ?>">
				<!-- load Topbar -->
				<div class="clearfix">
				<div class="row">
					<div class="col">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
								<form action="<?= base_url('PurchasingElektro/InventarisElektro/proses_tambah') ?>" id="form-tambah" method="POST"> 
									<div class="row">  
									<div class="col-md-12">
											<h5>Data Pengguna</h5>
											<hr>
											<div class="form-row">    
												<div class="form-group col-2">
													<label>Kode Transaksi</label>
													<input type="text" name="kode_transaksi" value="TI<?php echo sprintf("%03s", $kode_transaksi) ?>" readonly class="form-control"> 
												</div>
												<div class="form-group col-2">
													<label>Jam</label>
													<input type="text" name="jam" value="<?= date('H:i:s') ?>" readonly class="form-control"> 
												</div>
												<div class="form-group col-2">
													<label>Tanggal</label>
													<input type="text" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control"> 
												</div>
												<div class="form-group col-2">
													<label>Jenis Barang</label>
													<select name="keterangan" id="keterangan" class="form-control">
														<option value="">Pilih</option> 
															<option value="hfnc01">HFNC01</option> 
															<option value="Antropometri">Antropometri</option> 
															<option value="Dental Suction">Dental Suction</option> 
															<option value=">Dental Summit">Dental Summit</option> 
															<option value="Endoscopi">Endoscopi</option> 
															<option value="Lightsource">Lightsource</option> 
													</select>												
												</div>  
											</div>
										</div>


										<div class="col-md-12">
											<h5>Data Barang</h5>
											<hr>
											<div class="form-row"> 
												<div class="form-group col-3">
													<label>Nama Komponen</label>
													<input type="text" name="nama_komponen" value=""  class="form-control">
												</div> 
												<div class="form-group col-1">
													<label>Jumlah</label>
													<input type="number" name="jumlah" value="" class="form-control" min='1'>
												</div>  
												<div class="form-group col-1">
													<label>Satuan</label>
													<select name="satuan" id="satuan" class="form-control">
														<option value="">Pilih</option> 
															<option value="pcs">PCS</option>  
															<option value="Lente">Lente</option>   
															<option value="meter">Meter</option> 
													</select>												
												</div>
												<div class="form-group col-3">
												<label for="pengambil">Nama Pengambil</label>
													<select name="pengambil" id="pengambil" class="form-control">
														<option value="">Pilih</option> 
															<option value="Muhtar Solehudin">Muhtar Solehudin</option>  
															<option value="R. Gilang Fauzi Yusuf">R. Gilang Fauzi Yusuf</option>  
															<option value="Ahmad Sana">Ahmad Sana</option>  
															<option value="Syahfi Alief Ismail">Syahfi Alief Ismail</option>  
															<option value="Fakhri Zamzami">Fakhri Zamzami</option>  
															<option value="Muhammad Azka">Muhammad Azka</option>  
															<option value="Muhamad Aditya Wiguna">Muhamad Aditya Wiguna</option>  
															<option value="Ardhika Putra Ananda">Ardhika Putra Ananda</option>  
															<option value="Renaldi M. Pratama">Renaldi M. Pratama</option>  
															<option value="Difa Azhar Rifanka">Difa Azhar Rifanka</option>  
															<option value="Rizky Pratama">Rizky Pratama</option>   
													</select>
												</div>  
												<div class="form-group col-1">
													<label for="">&nbsp;</label>
													<button type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
												</div> 
											</div>
										</div>
									</div>
									<div class="keranjang">
										<h5>Detail Pengeluaran</h5>
										<hr>
										<table class="table table-bordered" id="keranjang">
											<thead>
												<tr>  
													<td width="15%">Tanggal</td>
													<td width="35%">Nama Komponen</td>
													<td width="35%">Nama Pengambil</td>
													<td width="15%">Jumlah</td>
													<td width="10%">Satuan</td> 
													<td width="15%">Keterangan</td>
													<td width="15%">Aksi</td>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
											<tfoot>
												<tr>
													<td colspan="12" align="center">
														<input type="hidden" name="max_hidden" value="">
														<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
													</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</form>
							</div>				
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- load footer -->
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
	
	<?php $this->load->view('partials/js.php') ?>
	<script>
		$(document).ready(function(){
			$('tfoot').hide()

			$(document).keypress(function(event){
		    	if (event.which == '13') {
		      		event.preventDefault();
			   	}
			}) 

			// $('#kode_komponen').on('change', function(){

			// 	if($(this).val() == '') reset()
			// 	else {
			// 		const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
			// 		$.ajax({
			// 			url: url_get_all_barang,
			// 			type: 'POST',
			// 			dataType: 'json',
			// 			data: {kode_komponen: $(this).val()},
			// 			success: function(data){
			// 				$('input[name="nama_komponen"]').val(data.nama_komponen) 
			// 				$('input[name="jumlah"]').val(1)
			// 				$('input[name="satuan"]').val(data.satuan)
			// 				$('input[name="keterangan"]').val(data.keterangan)
			// 				$('input[name="max_hidden"]').val(data.stok)
			// 				$('input[name="jumlah"]').prop('readonly', false)
			// 				$('button#tambah').prop('disabled', false)

			// 				$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
							
			// 				$('input[name="jumlah"]').on('keydown keyup change blur', function(){
			// 					$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
			// 				})
			// 			}
			// 		})
			// 	}
			// })

			$(document).on('click', '#tambah', function(e){
				const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
				const data_keranjang = { 
					tanggal: $('input[name="tanggal"]').val(), 
					nama_komponen: $('input[name="nama_komponen"]').val(),
					pengambil: $('select[name="pengambil"]').val(), 
					jumlah: $('input[name="jumlah"]').val(),
					satuan: $('select[name="satuan"]').val(), 
					keterangan: $('select[name="keterangan"]').val(),
				}

				$.ajax({
					url: url_keranjang_barang,
					type: 'POST',
					data: data_keranjang,
					success: function(data){
						if($('select[name="nama_komponen"]').val() == data_keranjang.nama_komponen) $('option[value="' + data_keranjang.nama_barang + '"]').hide()
						reset()

						$('table#keranjang tbody').append(data)
						$('tfoot').show()

						$('#total').html('<strong>' + hitung_total() + '</strong>')
						$('input[name="total_hidden"]').val(hitung_total())
					}
				})
			})


			$(document).on('click', '#tombol-hapus', function(){
				$(this).closest('.row-keranjang').remove()

				$('option[value="' + $(this).data('nama-barang') + '"]').show()

				if($('tbody').children().length == 0) $('tfoot').hide()
			})

			$('button[type="submit"]').on('click', function(){ 
				$('select[name="nama_komponen"]').prop('disabled', true)
				$('input[name="satuan"]').prop('disabled', true)
				$('input[name="jumlah"]').prop('disabled', true)
			})

			function hitung_total(){
				let total = 0;
				$('.sub_total').each(function(){
					total += parseInt($(this).text())
				})

				return total;
			}

			function reset(){ 
				$('#pengambil').val('') 
				$('input[name="nama_komponen"]').val('')  
				$('input[name="keterangan"]').val('')
				$('input[name="jumlah"]').val('')  
			}
		})
	</script> 
</body>
</html>