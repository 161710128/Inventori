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
                            <h1 class="float-left"><?= $title ?></h1>
                            <h3 class="float-right"><a href="<?= base_url('Packing/PengirimanBarang') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></h3> 
                        </div> 
                    </div> 
                </div> 
            </div>              

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">  
         <!-- <div class="col-md-6"> 
            <div class="card card-primary">
                <div class="card-header">
                    <?php 
                        $originalDate = $barang->tanggal;
                        $newDate = date("d/m/Y", strtotime($originalDate));
                    ?>
                    <h3 class="card-title">Data Barang - <?=  $newDate ?></h3>
                </div>  
                <form action="<?= base_url('Packing/PengirimanBarang/proses_tambahEdit') ?>" id="form-tambah" method="POST">
                    <input type="hidden" name="kode_transaksi" value="<?= $barang->kode_transaksi ?>" readonly class="form-control">
                    <input type="hidden" name="kode_pengguna" value="<?= $this->session->login['kode'] ?>" readonly class="form-control">
                    <input type="hidden" name="nama_pengguna" value="<?= $this->session->login['nama'] ?>" readonly class="form-control">
                    
                    <input type="hidden" name="jam_masuk" value="" readonly class="form-control">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_alat">Nama Alat</label>
                            <select name="kode_alat" id="kode_alat" class="form-control">
                                <option value="">Pilih</option>
                                <?php foreach ($all_barangHFNC as $komponen) : ?>
                                    <option value="<?= $komponen->kode_alat ?>" data-tanggal="<?= $komponen->tanggal ?>" data-serial-number="<?= $komponen->serial_number ?>" data-kode-transaksi="<?= $komponen->kode_transaksi ?>"><?= $komponen->nama_alat ?> - <?= $komponen->tanggal ?> <?= $komponen->total_kemunculan ?> 
									</option>
                                <?php endforeach ?>
                            </select> 
                        </div>  
						<input type="hidden" name="kode_transaksi_masuk" value="" class="form-control" readonly>
						<input type="hidden" name="serial_number" value="" class="form-control" readonly>
						<input type="hidden" name="kode_transaksi" value="<?= $barang->kode_transaksi ?>" readonly class="form-control">
						<input type="hidden" name="tanggal" value="" readonly class="form-control">
                        <div class="form-group">
                        <div class="form-group">
                            <label>Stok Alat</label>
                            <input type="text" name="stok_alat" value="" class="form-control" readonly>
							 <!--  <input type="text" name="kode_transaksi_masuk" value="<?= $komponen->kode_transaksi ?? '' ?>" readonly class="form-control"> 
                        </div> 
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" value="" class="form-control" readonly>
                        </div>   
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number"  id ="total_stok" name="total_stok" value="" class="form-control" readonly min='1'>
                        </div>  
                        <!-- <div class="form-group">
                            <label>Jumlah Reject</label>
                            <input type="number"  id ="total_reject" name="total_reject" value="" class="form-control" readonly min='1'>
                        </div>    -->
                        <!-- <div class="form-group">
                            <label>Serial Number</label>
                            <input type="text" name="serialnumber" value="" class="form-control" readonly>
                        </div>  
                        <div class="form-group">
                            <label>Catatan</label>
                            <input type="text" name="catatan" value="" class="form-control" readonly>
                        </div> 
                        <div class="form-group">
                            <label for="nama_shift">Nama Shift</label>
                            <select name="nama_shift" id="nama_shift" class="form-control" disabled >
                                <option value="">Pilih Shift</option> 
                                    <option value="non shift">Non Shift</option> 
                                    <option value="shift 1">Shift 1</option> 
                                    <option value="shift 2">Shift 2</option> 
                            </select>
                        </div>
                    </div> 
                    <div class="card-footer">
                        <button disabled type="button" class="btn btn-primary" id="tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</button> 
                    </div>
                    <input type="hidden" name="nama_alat" value=""> 
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="keranjang">
                            <thead>
                                <tr> 
                                    <td width="10%">Kode alat</td>
                                    <td width="20%">Nama Alat</td> 
									<td width="10%">Kode Transaksi</td> 
									<td width="10%">Serial Number</td> 
                                    <td width="5%">Jumlah</td>
                                    <!-- <td width="5%">Reject</td> 
                                    <td width="5%">Nama Shift</td> 
                                    <td width="10%">Catatan</td>
                                    <td width="10%">Tanggal</td>
                                    <td width="5%">Aksi</td>
                                </tr>
                            </thead>
                            <tbody> 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12" align="left">
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
        </div> -->
		<div class="col-md-12"> 
            <div class="card card-primary">
                <div class="card-header">
                    <?php 
                        $originalDate = $barang->tanggal;
                        $newDate = date("d/m/Y", strtotime($originalDate));
                    ?>
                    <h3 class="card-title">Data Barang - <?=  $newDate ?></h3>
                </div>  
                <div class="card-body">
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
								 <input type="hidden" name="kode_transaksi" value="<?= $barang->kode_transaksi ?>" readonly class="form-control">
								<table class="table table-bordered" id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
										  <th><strong>No</strong></th> 
										  <th><strong>Kode Alat</strong></th>
										  <th><strong>Nama Alat</strong></th>
										  <th><strong>Serial Number</strong></th> 
										  <th><strong>Catatan</strong></th>
										  <th><strong>Nama Shift</strong></th> 
										  <th><input type="checkbox" class="ceklis-checkbox-header" id="ceklis-header"></th>
										  </tr>
														</thead>
														<tbody>
															<?php foreach ($all_detail_terima as $detail_terima): ?>
																<tr>
																	<td></td> 
																	<td><?= $detail_terima->kode_alat ?></td> 
																	<td><?= $detail_terima->nama_alat ?></td> 
																	<td><?= $detail_terima->serial_number ?></td>  
																	<td><?= $detail_terima->catatan ?></td> 
																	<td><?= $detail_terima->nama_shift ?></td>
																	<td>
																	<input type="checkbox" class="ceklis-checkbox" data-kode="<?= $detail_terima->kode_alat ?>" data-id="<?= $detail_terima->id_detail ?>">
																	Kirim</td>
																</tr>
															<?php endforeach ?>
														</tbody>
														<tfoot>
										  <tr>
										  <th><strong>No</strong></th> 
										  <th><strong>Kode Alat</strong></th>
										  <th><strong>Nama Alat</strong></th>
										  <th><strong>Serial Number</strong></th> 
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
				</div> 
			</div> 
        </div> 
      </div> 
    </section>





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
        $(document).ready(function() {
			// Checkbox header
			$('#ceklis-header').change(function() {
				var isChecked = $(this).prop('checked'); // Mendapatkan status centang checkbox
				var kodeTransaksi = $('input[name="kode_transaksi"]').val();
				var selectedIds = []; 
				var selectedKode = [];// Array untuk menyimpan id_detail yang dicentang

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
					url: '<?= base_url('Packing/PengirimanBarang/updateKeteranganBatch') ?>', // Ganti dengan URL yang sesuai
					method: 'POST',
					data: { id_detail: selectedIds, kode_alat: selectedKode, keterangan: 'Dikirim', kode_transaksi: kodeTransaksi },
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


			// Checkbox tubuh tabel
			$('.ceklis-checkbox').change(function() {
				var isChecked = $(this).prop('checked'); // Mendapatkan status centang checkbox
				var idDetail = $(this).data('id');
				var kodeAlat = $(this).data('kode'); 				// Mendapatkan id_detail dari atribut data
				var kodeTransaksi = $('input[name="kode_transaksi"]').val();

				// Simpan referensi checkbox dalam variabel
				var $checkbox = $(this);

				// Kirim permintaan Ajax jika checkbox di dalam tubuh tabel dicentang
				$.ajax({
					url: '<?= base_url('Packing/PengirimanBarang/updateKeterangan') ?>', // Ganti dengan URL yang sesuai
					method: 'POST',
					data: { id_detail: idDetail, kode_alat : kodeAlat, keterangan: 'Dikirim', kode_transaksi: kodeTransaksi },
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



					
			
			$('.ceklis-button').click(function() {
				$(this).text('✓'); 
				// Mengubah teks tombol menjadi tanda centang (✓)
			});
			
	
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

            $('#kode_alat').on('change', function() {

                if ($(this).val() == '') reset()
                else {
                    // const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
                    $.ajax({
                        url: "<?= base_url() ?>Packing/PengirimanBarang/get_all_barang",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            kode_alat: $(this).val()
                        },
                        success: function(data) {
                            $('input[name="stok_alat"]').val(data.stok_alat)
                            $('input[name="keterangan"]').val(data.keterangan)
                            // $('input[name="keterangan"]').val(data.keterangan) 
                            $('input[name="nama_alat"]').val(data.nama_alat)  
                            $('input[name="serialnumber"]').val()
                            $('input[name="serialnumber"]').prop('readonly', false)
                            $('input[name="total_stok"]').val(1)
                            $('input[name="total_stok"]').prop('readonly', false)
                            // $('input[name="total_reject"]').val(0)
                            // $('input[name="total_reject"]').prop('readonly', false) 
                            $('select[name="nama_shift"]').prop('disabled', false)
                            $('input[name="catatan"]').prop('readonly', false)

                            $('button#tambah').prop('disabled', false)
                            $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
                            $('input[name="jumlah"]').on('keydown keyup change blur', function() {
                                $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
                            })
                        }
                    })
                }
            })
			
			
			$("#kode_alat").change(function() {
				// Mengambil nilai "data-kode-transaksi" dan "data-serial-number" dari opsi yang dipilih
				var kodeTransaksi = $(this).find(":selected").data("kode-transaksi");
				var serialNumber = $(this).find(":selected").data("serial-number");
				var Tanggal = $(this).find(":selected").data("serial-tanggal");
				
				// Mengatur nilai input "kode_transaksi_masuk" dan "serial_number" sesuai dengan kodeTransaksi dan serialNumber
				$("#kode_transaksi_masuk").val(kodeTransaksi);
				$("#serial_number").val(serialNumber);
				$("#tanggal").val(Tanggal);
			});

				
							  // Mendapatkan elemen-elemen yang diperlukan
			// Mendapatkan elemen-elemen yang diperlukan
				const kodeAlatSelect = document.getElementById('kode_alat');
				const kodeTransaksiInput = document.querySelector('input[name="kode_transaksi_masuk"]');
				const serialNumberInput = document.querySelector('input[name="serial_number"]');
					const inputTanggal = document.querySelector('input[name="tanggal"]');

				// Menambahkan event listener ke elemen <select> untuk memperbarui nilai input text
				kodeAlatSelect.addEventListener('change', function () {
					const selectedOption = this.options[this.selectedIndex];
					const kodeTransaksi = selectedOption.getAttribute('data-kode-transaksi');
					const serialNumber = selectedOption.getAttribute('data-serial-number');
					const Tanggal = selectedOption.getAttribute('data-tanggal');
					
					kodeTransaksiInput.value = kodeTransaksi;
					serialNumberInput.value = serialNumber; 
					inputTanggal.value = Tanggal;// Menambahkan nilai serial number ke input "serial_number"
				});


            $(document).on('click', '#tambah', function(e) {
                const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
                const data_keranjang = {

                    kode_alat: $('select[name="kode_alat"]').val(),
                    nama_alat: $('input[name="nama_alat"]').val(),
					kode_transaksi_masuk: $('input[name="kode_transaksi_masuk"]').val(),
					serial_number: $('input[name="serial_number"]').val(),
                    // stok_alat: $('input[name="stok_alat"]').val(),
                    serialnumber: $('input[name="serialnumber"]').val(),
                    total_stok: $('input[name="total_stok"]').val(),
                    keterangan: $('input[name="keterangan"]').val(),
                    tanggal: $('input[name="tanggal"]').val(),
                    nama_shift: $('select[name="nama_shift"]').val(), 
                    catatan: $('input[name="catatan"]').val(),
                }

                $.ajax({
                    url: "<?= base_url() ?>Packing/PengirimanBarang/keranjang_barang",
                    type: 'POST',
                    data: data_keranjang,
                    success: function(data) {
                        if ($('select[name="nama_komponen"]').val() == data_keranjang.nama_komponen) $('option[value="' + data_keranjang.nama_barang + '"]').hide()
                        reset()

                        $('table#keranjang tbody').append(data)
                        $('tfoot').show()

                        $('#total').html('<strong>' + hitung_total() + '</strong>')
                        $('input[name="total_hidden"]').val(hitung_total())
                    }
                })
            })


            $(document).on('click', '#tombol-hapus', function() {
                $(this).closest('.row-keranjang').remove()

                $('option[value="' + $(this).data('nama-barang') + '"]').show()

                if ($('tbody').children().length == 0) $('tfoot').hide()
            })

            $('button[type="submit"]').on('click', function() {
                $('input[name="kode_komponen"]').prop('disabled', true)
                $('select[name="nama_komponen"]').prop('disabled', true)
                $('input[name="satuan"]').prop('disabled', true)
                $('input[name="jumlah"]').prop('disabled', true)
            })

            function hitung_total() {
                let total = 0;
                $('.sub_total').each(function() {
                    total += parseInt($(this).text())
                })

                return total;
            }

            function reset() {
                $('#kode_alat').val('')
                
                $('input[name="nama_alat"]').val('') 
                $('input[name="stok_alat"]').val('')  
                $('input[name="serialnumber"]').val('')
                $('input[name="serialnumber"]').prop('readonly', true) 
                $('input[name="total_stok"]').val('')
                $('input[name="total_stok"]').prop('readonly', true) 
                // $('select[name="nama_shift"]').val('')
                $('select[name="nama_shift"]').prop('disabled', true)
                $('input[name="keterangan"]').val('')
                $('input[name="keterangan"]').prop('readonly', true)
                $('input[name="catatan"]').val('')
                $('input[name="catatan"]').prop('readonly', true)
                $('button#tambah').prop('disabled', true)
            }
        }) 

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