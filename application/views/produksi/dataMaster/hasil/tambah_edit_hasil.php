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
                            <h3 class="float-right"><a href="<?= base_url('Produksi/HasilAlat') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></h3> 
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
             

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Barang - <?= $barang->tanggal ?></h3>
                </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="<?= base_url('Produksi/HasilAlat/proses_tambahEdit') ?>" id="form-tambah" method="POST"> 
    					<input type="hidden" name="kode_transaksi" value="<?= $barang->kode_transaksi ?>" readonly class="form-control">  
    					<input type="hidden" name="kode_pengguna" value="<?= $this->session->login['kode'] ?>" readonly class="form-control"> 
    					<input type="hidden" name="nama_pengguna" value="<?= $this->session->login['nama'] ?>" readonly class="form-control"> 
    					<input type="hidden" name="tanggal_keluar" value="<?= $barang->tanggal ?>" readonly class="form-control"> 
    					<input type="hidden" name="jam_keluar" value=" " readonly class="form-control">
                    <div class="card-body">
                        <div class="form-group">
        					<label for="kode_alat">Kode Alat</label>
        					<select name="kode_alat" id="kode_alat" class="form-control">
        						<option value="">Pilih</option>
        						<?php foreach ($all_komponen as $komponen): ?>
        							<option value="<?= $komponen->kode_alat ?>"><?= $komponen->nama_alat ?> [<?= $komponen->nama_tindakan ?>]</option>
        						<?php endforeach ?>
        					</select>
        				</div> 
        				<div class="form-group">
        					<label>Nama Tindakan</label>
        					<input type="text" name="nama_tindakan" value=""  class="form-control" readonly>
        				</div>
        				<div class="form-group">
        					<label for="shift">Shift</label>
        					<select name="shift" id="shift" class="form-control">
        						<option value="">Pilih</option>
        							<option value="Shift 1">Shift 1</option>
        							<option value="Shift 2">Shift 2</option>
        							<option value="Non Shift">Non Shift</option>
        					</select>
        				</div> 
        				<div class="form-group">
        					<label>Keterangan</label>
        					<input type="text" name="keterangan" value=""  class="form-control">
        				</div>
        				<div class="form-group">
        					<label>Total Assembly</label>
        					<input type="number" name="jumlah" value="" class="form-control" min='1'>
        				</div>
        				<!--<div class="form-group">-->
        				<!--	<label for="">&nbsp;</label>-->
        				<!--	<button type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>-->
        				<!--</div>-->
        				<div class="card-footer">
                            <button disabled type="button" class="btn btn-primary" id="tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</button> 
                        </div> 
                    </div>
                    <input type="hidden" name="nama_alat" value="">
    				<input type="hidden" name="id_tindakan" value="">
                    <!-- /.card-body --> 
                    
                    <!--<div class="card-footer">-->
                    <!--    <button disabled type="button" class="btn btn-primary" id="tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</button> -->
                    <!--</div>-->
                    
                    <input type="hidden" name="nama_alat" value=""> 
                    
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="keranjang">
                            <thead>
                                <tr>
                                    <td width="10%">Kode Alat</td>
									<td width="15%">Nama Alat</td>
									<td width="10">Total Assembly</td>
									<td width="15">Shift</td>
									<td width="15%">Keterangan</td> 
									<td width="10%">Tanggal</td>
									<td width="15%">Jam</td>
									<td width="15%">Aksi</td>
                                </tr>
                            </thead>
                            <tbody> 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12" align="left">
                                        <input type="hidden" name="max_hidden" value="">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button> 
                                        <br>
                                        <br>
                                    
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form> 
            </div> 
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>




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



            $(document).ready(function () {
            	$('#kode_alat').select2();
            });

            $('#kode_alat').on('change', function() {

                if ($(this).val() == '') reset()
                else {
                    // const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
                    $.ajax({
                        url: "<?= base_url() ?>Produksi/HasilAlat/get_all_barang",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            kode_alat: $(this).val()
                        },
                        success: function(data) {
                           $('select[name="kode_alat"]').val(data.kode_alat) 
    						$('input[name="nama_alat"]').val(data.nama_alat) 
    						$('input[name="nama_tindakan"]').val(data.nama_tindakan) 
    						$('input[name="id_tindakan"]').val(data.id_tindakan) 
    						$('select[name="shift"]').val(data.shift) 
    						$('input[name="jumlah"]').val(0) 
    						$('input[name="keterangan"]').val(data.keterangan)
    						$('button#tambah').prop('disabled', false)
                        }
                    })
                }
            })

            $(document).on('click', '#tambah', function(e) {
                const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
                const data_keranjang = {

                    kode_alat: $('select[name="kode_alat"]').val(),
				nama_alat: $('input[name="nama_alat"]').val(),
				id_tindakan: $('input[name="id_tindakan"]').val(),
				kode_transaksi: $('input[name="kode_transaksi"]').val(),
				keterangan: $('input[name="keterangan"]').val(),
				jumlah: $('input[name="jumlah"]').val(),
				shift: $('select[name="shift"]').val(),
				tanggal_keluar: $('input[name="tanggal_keluar"]').val(), 
				jam_keluar: $('input[name="jam_keluar"]').val(), 
				id_tindakan: $('input[name="id_tindakan"]').val()
                }

                $.ajax({
                    url: "<?= base_url() ?>Produksi/HasilAlat/keranjang_barang",
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
                $('#kode_alat').select2('destroy').val("").select2()
                //$('select[name="kode_alat"]').val([])
    			$('input[name="nama_barang"]').val('')
    			$('input[name="nama_tindakan"]').val('')
    			$('input[name="total_assy"]').val('') 
    			$('input[name="keterangan"]').val('')
    			$('input[name="jumlah"]').val('')
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