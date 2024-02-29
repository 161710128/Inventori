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
                            <h3 class="float-right"><a href="<?= base_url('Produksi/StokAlat') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></h3> 
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
                                <div class="col-6">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h2 class="card-title">
                                                <strong>Data Barang - <?= $barang->tanggal ?></strong> 
                                            </h2>  
                                            <!-- <div class="float-right"><a href="<?= base_url('Produksi/StokAlat') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></div> -->
                                        </div>
                                        <div class="card-body">
                                            <form action="<?= base_url('Produksi/StokAlat/proses_tambahEdit') ?>" id="form-tambah" method="POST">
                                                <!-- <h5>Data Pengguna</h5> -->
                                                <!-- <h5><strong>Data Barang - <?= $barang->tanggal ?></strong></h5>
                                                <hr> -->
                                                <!-- <div class="form-row"> -->
													<!-- <div class="form-group"> -->
														<!-- <label>Kode Transaksi</label> -->
														<input type="hidden" name="kode_transaksi" value="<?= $barang->kode_transaksi ?>" readonly class="form-control">
													<!-- </div> -->
													<!-- <div class="form-group"> -->
														<!-- <label>Kode Pengguna</label> -->
														<input type="hidden" name="kode_pengguna" value="<?= $this->session->login['kode'] ?>" readonly class="form-control">
													<!-- </div> -->
													<!-- <div class="form-group"> -->
														<!-- <label>Nama Pengguna</label> -->
														<input type="hidden" name="nama_pengguna" value="<?= $this->session->login['nama'] ?>" readonly class="form-control">
													<!-- </div> -->
													<!-- <div class="form-group"> -->
														<!-- <label>Tanggal</label> -->
														<input type="hidden" name="tanggal_masuk" value="<?= $barang->tanggal ?>" readonly class="form-control">
													<!-- </div> -->
													<!-- <div class="form-group"> -->
														<!-- <label>Jam</label> -->
														<input type="hidden" name="jam_masuk" value="" readonly class="form-control">
													<!-- </div> -->
												<!-- </div> -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- <h5>Data Barang</h5>
                                                        <hr> -->
                                                        <!-- <div class="form-row"> -->
                                                            <div class="form-group">
                                                                <label for="kode_alat">Nama Alat</label>
                                                                <select name="kode_alat" id="kode_alat" class="form-control">
                                                                    <option value="">Pilih</option>
                                                                    <?php foreach ($all_barangHFNC as $komponen) : ?>
                                                                        <option value="<?= $komponen->kode_alat ?>"><?= $komponen->nama_alat ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>  
                                                            <div class="form-group">
                                                                <label>Status Alat</label>
                                                                <input type="text" name="status_alat" value="" class="form-control" readonly>
                                                            </div>   
                                                            <div class="form-group">
                                                                <label>Jumlah</label>
                                                                <input type="number"  id ="jumlah" name="jumlah" value="" class="form-control" readonly min='1'>
                                                            </div>  
                                                            <div class="form-group">
                                                                <label for="nama_shift">Nama Shift</label>
                                                                <select name="nama_shift" id="nama_shift" class="form-control" disabled>
                                                                    <option value="">Pilih Shift</option> 
                                                                        <option value="shift 1">Shift 1</option> 
                                                                        <option value="shift 2">Shift 2</option> 
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Keterangan</label>
                                                                <input type="text" name="keterangan" value="" class="form-control" readonly>
                                                            </div> 
                                                                 
                                                            <!-- <div class="card-footer">
                                                                <label for="">&nbsp;</label>
                                                                <button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
                                                            </div> -->
                                                            <div class="card-footer">
                                                            <button disabled type="button" class="btn btn-primary" id="tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</button>
                                                            <!-- <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> -->
                                                            </div>
                                                        <!-- </div> --> 
                                                        <input type="hidden" name="nama_alat" value=""> 
                                                    </div>
                                                </div> 
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap" id="keranjang">
                                                        <thead>
                                                            <tr>
                                                                <td width="10%">Kode alat</td>
                                                                <td width="20%">Nama Alat</td>
                                                                <td width="20%">Status Part</td>
                                                                <td width="10%">Keterangan</td>
                                                                <td width="5%">Jumlah</td>
                                                                <td width="10%">Nama Shift</td> 
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

            $('#kode_alat').on('change', function() {

                if ($(this).val() == '') reset()
                else {
                    // const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
                    $.ajax({
                        url: "<?= base_url() ?>Produksi/StokAlat/get_all_barang",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            kode_alat: $(this).val()
                        },
                        success: function(data) {
                            $('input[name="status_alat"]').val(data.status_alat)
                            // $('input[name="keterangan"]').val(data.keterangan) 
                            $('input[name="nama_alat"]').val(data.nama_alat)  
                            $('input[name="jumlah"]').val(0)

                            
                            // $('input[name="satuan"]').val(data.satuan) 
                            // $('input[name="max_hidden"]').val(data.stok)
                            // $('input[name="nama_mp"]').prop('readonly', false)
                            // $('input[name="jumlah_bagus"]').prop('readonly', false)
                            $('input[name="jumlah"]').prop('readonly', false)
                            $('input[name="keterangan"]').prop('readonly', false)
                            $('select[name="nama_shift"]').prop('disabled', false)
                            // $('input[name="catatan"]').prop('readonly', false)

                            $('button#tambah').prop('disabled', false)
                            $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
                            $('input[name="jumlah"]').on('keydown keyup change blur', function() {
                                $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
                            })
                        }
                    })
                }
            })

            $(document).on('click', '#tambah', function(e) {
                const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
                const data_keranjang = {

                    kode_alat: $('select[name="kode_alat"]').val(),
                    nama_alat: $('input[name="nama_alat"]').val(),
                    status_alat: $('input[name="status_alat"]').val(),
                    keterangan: $('input[name="keterangan"]').val(),
                    jumlah: $('input[name="jumlah"]').val(),
                    nama_shift: $('select[name="nama_shift"]').val(),

                    // jam_masuk: $('input[name="jam_masuk"]').val(),

                    // part_name: $('input[name="part_name"]').val(), 
                    // jobdesc: $('input[name="jobdesc"]').val(),
                    // nama_mp: $('input[name="nama_mp"]').val(),
                    // jumlah_bagus: $('input[name="jumlah_bagus"]').val(),
                    // jumlah_rijek: $('input[name="jumlah_rijek"]').val(),
                    // nama_shift: $('select[name="nama_shift"]').val(),
                    // catatan: $('input[name="catatan"]').val(),
                    // job: $('input[name="job"]').val(),
                    // id_barang: $('input[name="id_barang"]').val(),
                    // pengambil: $('select[name="pengambil"]').val(),
                }

                $.ajax({
                    url: "<?= base_url() ?>Produksi/StokAlat/keranjang_barang",
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
                $('input[name="status_alat"]').val('')  
                $('input[name="jumlah"]').val('')
                $('input[name="jumlah"]').prop('readonly', true) 
                // $('select[name="nama_shift"]').val('')
                $('select[name="nama_shift"]').prop('disabled', true)
                $('input[name="keterangan"]').val('')
                $('input[name="keterangan"]').prop('readonly', true)
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