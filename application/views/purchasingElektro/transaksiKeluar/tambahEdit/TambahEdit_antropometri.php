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
							<!-- <h1 class="float-right"><a href="<?= base_url('PengeluaranElektro') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></h1> 	 -->
						</div>
					</div>
				</div>
			</div>

			<section id="content" class="content" data-url="<?= base_url('PengeluaranElektro') ?>">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
							<div class="card-header">
								<h3 class="card-title">
									<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tampilkan Data</a>
									<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"> 
										<li><a href="<?= base_url('PurchasingElektro/PengeluaranElektro/tambahUbah_timbanganDewasa/' . $barang->kode_transaksi) ?>" class="dropdown-item">Timbangan Dewasa</a></li>   
										<li><a href="<?= base_url('PurchasingElektro/PengeluaranElektro/tambahUbah_timbanganBayi/' . $barang->kode_transaksi) ?>" class="dropdown-item">Timbangan Bayi</a></li> 
									</ul> 

								</h3>  
								<div class="float-right"><a href="<?= base_url('PurchasingElektro/PengeluaranElektro') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></div>
								
							</div>
							<!-- /.card-header -->
								<div class="card-body">
									<form id="form-tambah" method="POST">
										<h5>Data Pengguna</h5>
										<hr>
										<div class="form-row">
											<div class="form-group col-2">
												<label>Kode Transaksi</label>
												<input type="text" name="kode_transaksi" value="<?= $barang->kode_transaksi ?>" readonly class="form-control">
											</div>
											<div class="form-group col-3">
												<label>Kode Pengguna</label>
												<input type="text" name="kode_pengguna" value="<?= $this->session->login['kode'] ?>" readonly class="form-control">
											</div>
											<div class="form-group col-3">
												<label>Nama Pengguna</label>
												<input type="text" name="nama_pengguna" value="<?= $barang->nama_pengguna ?>" readonly class="form-control">
											</div>
											<div class="form-group col-2">
												<label>Tanggal Keluar</label>
												<input type="text" name="tanggal_masuk" value="<?= date('Y/m/d') ?>" readonly class="form-control">
											</div>
											<div class="form-group col-2">
												<label>Jam</label>
												<input type="text" name="jam_masuk" value="<?= $barang->jam_keluar ?>" readonly class="form-control">
											</div>
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
	<script>
		$(document).ready(function() {
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

			$('#kode_komponen').on('change', function(){

				if($(this).val() == '') reset()
				else {
					const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
					$.ajax({
						url: url_get_all_barang,
						type: 'POST',
						dataType: 'json',
						data: {kode_komponen: $(this).val()},
						success: function(data){
							$('input[name="nama_komponen"]').val(data.nama_komponen)
							$('input[name="id_barang"]').val(data.id_barang) 
							$('input[name="jumlah"]').val(1)
							$('input[name="satuan"]').val(data.satuan)
							// $('input[name="keterangan"]').val(data.keterangan)
							$('input[name="max_hidden"]').val(data.stok) 
							$('input[name="jumlah"]').prop('readonly', false)   
							$('select[name="keterangan"]').prop('disabled', false)   
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

			$(document).on('click', '#tambah', function(e){
				const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
				const data_keranjang = {
					kode_komponen: $('select[name="kode_komponen"]').val(),
					tanggal_masuk : $('input[name="tanggal_masuk"]').val(),
					nama_komponen: $('input[name="nama_komponen"]').val(),
					jumlah: $('input[name="jumlah"]').val(),
					satuan: $('input[name="satuan"]').val(),
					keterangan: $('select[name="keterangan"]').val(), 
					pengambil: $('select[name="pengambil"]').val(), 
					id_barang: $('input[name="id_barang"]').val(),
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
				$('#kode_komponen').val('')
				$('input[name="nama_komponen"]').val('') 
				$('input[name="id_barang"]').val('') 
				$('select[name="keterangan"]').val('')
				$('select[name="pengambil"]').val('')
				$('input[name="jumlah"]').val('')
				$('input[name="jumlah"]').prop('readonly', true)
				$('select[name="keterangan"]').prop('disabled', true)
				$('select[name="pengambil"]').prop('disabled', true)
				$('button#tambah').prop('disabled', true)
			}
		})
	</script>
</body>
</html>
