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
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">  
						<div class="col-sm-12"> 
							<h1 class="float-left"><?= $title?></h1> 
							<h1 class="float-right"><a href="<?= base_url('PurchasingMekanik/PeminjamanBarang') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></h1> 	
						</div>
					</div>
				</div>
			</div>
			<section id="content" class="content" data-url="<?= base_url('PurchasingMekanik/PeminjamanBarang') ?>">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Isi Form Dibawah Ini!</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<form action="<?= base_url('PurchasingMekanik/PeminjamanBarang/proses_tambah') ?>" id="form-tambah" method="POST">
									<h5>Data Pengguna</h5>
									<hr>
									<div class="form-row">
										<!-- <div class="form-group col-2">
											<label>Kode Transaksi</label>
											<input type="text" name="kode_transaksi" value="MP<?php echo sprintf("%03s", $kode_pinjam) ?>" readonly class="form-control">
										</div> -->
										<div class="form-group col-3">
											<label>Kode Pengguna</label>
											<input type="text" name="kode_pengguna" value="<?= $this->session->login['kode'] ?>" readonly class="form-control">
										</div>
										<div class="form-group col-3">
											<label>Nama Pengguna</label>
											<input type="text" name="nama_pengguna" value="<?= $this->session->login['nama'] ?>" readonly class="form-control">
										</div>
										<div class="form-group col-2">
											<label>Tanggal</label>
											<input type="text" name="tanggal_masuk" value="<?= date('Y/m/d') ?>" readonly class="form-control">
										</div>
										<div class="form-group col-2">
											<label>Jam</label>
											<!-- <input type="text" name="jam_masuk" value="<?= date('H:i:s') ?>" readonly class="form-control">  -->
											<input type="text" name="jam_masuk" value="" readonly class="form-control"> 
										</div>
									</div> 
									<div class="row"> 
										<div class="col-md-12">
											<h5>Data Barang</h5>
											<hr>
											<div class="form-row">
												<div class="form-group col-2">
													<label for="kode_part">Nama Barang</label>
													<select name="kode_part" id="kode_part" class="form-control">
														<option value="">Pilih</option>
														<?php foreach ($all_barang as $komponen): ?>
															<option value="<?= $komponen->kode_part ?>"><?= $komponen->kode_part ?>   <?= $komponen->nama_barang ?> </option>
														<?php endforeach ?>
													</select>
												</div> 
												<div class="form-group col-2">
													<label>Spesifikasi</label>
													<input type="text" name="spesifikasi" value="" readonly class="form-control">
												</div> 
												<div class="form-group col-2">
													<label>Satuan</label>
													<input type="text" name="keterangan" value=""  readonly class="form-control">
												</div>
												<div class="form-group col-1" hidden>
													<label>Jumlah</label>
													<input type="number" name="jumlah" readonly value="" class="form-control" readonly min='1'>
												</div> 
												<div class="form-group col-2">
													<label for="pengambil">Nama Pengambil</label>
													<select name="pengambil" id="pengambil" class="form-control">
														<option value="">Pilih</option>
														<?php foreach ($all_pengambil as $pengambil) : ?>
															<option value="<?= $pengambil->nama_karyawan ?>"><?= $pengambil->nama_karyawan ?></option>
														<?php endforeach ?>
													</select>
												</div> 
												<div class="form-group col-1">
													<label for="alat">Peruntukan</label>
													<select name="alat" id="alat" class="form-control">
														<option value="">Pilih</option>
														<?php foreach ($all_alat as $alat) : ?>
															<option value="<?= $alat->nama_barang ?>"><?= $alat->nama_barang ?></option>
														<?php endforeach ?>
													</select>
												</div> 
											     <div class="form-group col-1">
													<label for="divisi">Divisi</label>
													<select name="divisi" id="divisi" class="form-control">
														<option value="">Pilih</option>
														<option value="PRODUKSI">PRODUKSI</option>
														<option value="RND">RND</option>
														<option value="QC DAN KALIBRASI ALKES">QC DAN KALIBRASI ALKES</option>
														<option value="INSTALASI DAN REPAIR">INSTALASI DAN REPAIR</option>
														<option value="SUPPLY CHAIN MANAGEMENT">SUPPLY CHAIN MANAGEMENT</option>
														<option value="PRODUK SPESIALIS">PRODUK SPESIALIS</option>
														<option value="GEOTEKNIK">GEOTEKNIK</option>
													</select>
												</div> 
												<div class="form-group col-1">
													<label for="">&nbsp;</label>
													<button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
												</div>
												<input type="hidden" name="satuan" value=""> 
												<input type="hidden" name="nama_barang" value=""> 
											</div>
										</div>
									</div>
									<div class="keranjang">
										<h5>Detail Pengeluaran</h5>
										<hr>
										<table class="table table-bordered" id="keranjang">
											<thead>
												<tr>
													<td width="10%">Kode Part</td>
													<td width="30%">Nama Barang</td>
													<td width="15%">Spesifikasi</td>
													<td width="5%">Jumlah</td> 
													<td width="10%">Satuan</td> 
													<td width="10%">Peruntukan</td> 
													<td width="10%">Divisi</td> 
													<td width="15%">Pengambil</td>  
													<td width="10%">Tanggal</td> 
													<td width="10%">Jam</td> 
													<td width="5%">Aksi</td>
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

<?php $this->load->view('partials/js.php') ?>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    

	<script> 
		$(document).ready(function(){
			$('tfoot').hide()

			startDigitalClock();
			

			$(document).keypress(function(event){
		    	if (event.which == '13') {
		      		event.preventDefault();
			   	}
			}) 
			
			function startDigitalClock() {
				// Update the digital clock every second
				// setInterval(updateDigitalClock, 1000);
				setInterval(updateDigitalClock, 1);
			}

			function updateDigitalClock() {
				const now = new Date();
				const hour = now.getHours();
				const minute = now.getMinutes();
				const second = now.getSeconds();
				const jamMasukValue = `${hour.toString().padStart(2, '0')}:${minute.toString().padStart(2, '0')}:${second.toString().padStart(2, '0')}`;
				
				$('input[name="jam_masuk"]').val(jamMasukValue);
			}
			
			$(document).ready(function () {
                $('#kode_part').select2();
            });
            
            $(document).ready(function () {
                $('#pengambil').select2();
            });
            
			$('#kode_part').on('change', function(){

				if($(this).val() == '') reset()
				else {
					const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
					$.ajax({
						url: url_get_all_barang,
						type: 'POST',
						dataType: 'json',
						data: {kode_part: $(this).val()},
						success: function(data){
							$('input[name="nama_barang"]').val(data.nama_barang)
							// $('input[name="id_barang"]').val(data.id_barang)
							$('input[name="spesifikasi"]').val(data.spesifikasi) 
							$('input[name="jumlah"]').val(1) 
							$('input[name="pengambil"]').val(data.pengambil)
							$('input[name="satuan"]').val(data.satuan)
							$('input[name="keterangan"]').val(data.keterangan) 
							$('input[name="max_hidden"]').val(data.stok)
							$('input[name="alat"]').val(data.stok)
							$('input[name="divisi"]').val(data.stok)
							$('input[name="jumlah"]').prop('readonly', true)
							$('select[name="pengambil"]').prop('disabled', false)
							$('button#tambah').prop('disabled', false) 

							$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
							$('input[name="jumlah"]').on('keydown keyup change blur', function(){
								$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
							})
						}
					})
				}
			})  

			// $(document).on('click', '#tambah', function(e){ 

				// const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang';
				// const data_keranjang = {
					// kode_part: $('select[name="kode_part"]').val(),
					// nama_barang: $('input[name="nama_barang"]').val(),
					// spesifikasi: $('input[name="spesifikasi"]').val(),
					// jumlah: $('input[name="jumlah"]').val(),
					// satuan: $('input[name="satuan"]').val(),
					// tanggal_masuk: $('input[name="tanggal_masuk"]').val(),
					// jam_masuk: $('input[name="jam_masuk"]').val(),
					// keterangan: $('input[name="keterangan"]').val(),
					// pengambil: $('select[name="pengambil"]').val(),
				// }; 

				// $.ajax({
					// url: url_keranjang_barang,
					// type: 'POST',
                    // data: data_keranjang,
                    // success: function(data) {
                        // if ($('select[name="nama_komponen"]').val() == data_keranjang.nama_komponen) $('option[value="' + data_keranjang.nama_barang + '"]').hide()
                        // reset()

                        // $('table#keranjang tbody').append(data)
                        // $('tfoot').show()

                        // $('#total').html('<strong>' + hitung_total() + '</strong>')
                        // $('input[name="total_hidden"]').val(hitung_total())
                    // }
                // })
            // })
			
			$(document).on('click', '#tambah', function(e) {

				const selectedKodePart = $('select[name="kode_part"]').val();
				const selectedOption = $('select[name="kode_part"] option:selected');

				const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang';
				const data_keranjang = {
					kode_part: selectedKodePart,
					nama_barang: $('input[name="nama_barang"]').val(),
					spesifikasi: $('input[name="spesifikasi"]').val(),
					jumlah: $('input[name="jumlah"]').val(),
					satuan: $('input[name="satuan"]').val(),
					tanggal_masuk: $('input[name="tanggal_masuk"]').val(),
					jam_masuk: $('input[name="jam_masuk"]').val(),
					keterangan: $('input[name="keterangan"]').val(),
					pengambil: $('select[name="pengambil"]').val(),
					alat: $('select[name="alat"]').val(),
					divisi: $('select[name="divisi"]').val(),
				};

				// Disable or hide the selected option in the dropdown
				selectedOption.prop('disabled', true);
				// Or you can hide it if you want to visually remove it from the dropdown
				// selectedOption.hide();

				$.ajax({
					url: url_keranjang_barang,
					type: 'POST',
					data: data_keranjang,
					success: function(data) {
						reset();
						$('table#keranjang tbody').append(data);
						$('tfoot').show();
						$('#total').html('<strong>' + hitung_total() + '</strong>');
						$('input[name="total_hidden"]').val(hitung_total());
					}
				});
			});


			$(document).on('click', '#tombol-hapus', function(){
				$(this).closest('.row-keranjang').remove()

				$('option[value="' + $(this).data('nama-barang') + '"]').show()

				if($('tbody').children().length == 0) $('tfoot').hide()
			})

			$('button[type="submit"]').on('click', function(){
				$('input[name="kode_komponen"]').prop('disabled', true)
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
				$('#kode_part').val('')  
				$('input[name="nama_barang"]').val('')
				$('input[name="spesifikasi"]').val('') 
				// $('input[name="id_barang"]').val('') 
				$('input[name="keterangan"]').val('')
				$('input[name="jumlah"]').val('')
				$('input[name="jumlah"]').prop('readonly', true)
				//$('select[name="pengambil"]').val('')
				$('select[name="pengambil"]').prop('disabled', true)
				$('button#tambah').prop('disabled', true)
			}
		})
	</script>
</body>
</html>
