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
                                                    <li><a href="<?= base_url('PurchasingElektro/PengambilanElektro/tambahTimbanganDewasa') ?>" class="dropdown-item">Timbangan Dewasa</a></li>   
											        <li><a href="<?= base_url('PurchasingElektro/PengambilanElektro/tambahTimbanganBayi') ?>" class="dropdown-item">Timbangan Bayi</a></li> 
												</ul>
                                            </h3>  
                                            <div class="float-right"><a href="<?= base_url('PurchasingElektro/PengambilanElektro/tambahAntropometri') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></div>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?= base_url('PurchasingElektro/PengambilanElektro/prosesTambah_timbanganDewasa') ?>" id="form-tambah" method="POST">
                                                <h5>Data Pengguna</h5>
                                                <hr>
                                                <div class="form-row">
													<div class="form-group col-2">
														<label>Kode Transaksi</label>
														<input type="text" name="kode_transaksi" value="TP<?php echo sprintf("%03s", $kode_transaksi) ?>" readonly class="form-control">
													</div>
													<div class="form-group col-3">
														<label>Kode Pengguna</label>
														<input type="text" name="kode_pengguna" value="<?= $this->session->login['kode'] ?>" readonly class="form-control">
													</div>
													<div class="form-group col-3">
														<label>Nama Pengguna</label>
														<input type="text" name="nama_pengguna" value="<?= $this->session->login['nama'] ?>" readonly class="form-control">
													</div>
													<div class="form-group col-2">
														<label>Tanggal Terima</label>
														<input type="text" name="tanggal_keluar" value="<?= date('d/m/Y') ?>" readonly class="form-control">
													</div>
													<div class="form-group col-2">
														<label>Jam</label>
														<input type="text" name="jam_keluar" value="<?= date('H:i:s') ?>" readonly class="form-control">
													</div>
												</div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>Data Barang</h5>
                                                        <hr>
                                                        <div class="form-row">
                                                            <div class="form-group col-3">
                                                                <label for="kode_komponen">Nama Barang</label>
                                                                <select name="kode_komponen" id="kode_komponen" class="form-control">
                                                                    <option value="">Pilih</option>
                                                                    <?php foreach ($all_barangDewasa as $komponen) : ?>
                                                                        <option value="<?= $komponen->kode_komponen ?>"><?= $komponen->nama_komponen ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div> 
															<div class="form-group col-2">
																<label for="pengambil">Nama Pengambil</label>
																<select name="pengambil" id="pengambil" class="form-control" disabled>
                                                                    <option value="">Pilih</option>
                                                                    <?php foreach ($all_pengambil as $pengambil) : ?>
                                                                        <option value="<?= $pengambil->nama_karyawan ?>"><?= $pengambil->nama_karyawan ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
															</div>
                                                           
															<div class="form-group col-3">
                                                                <label for="peruntukan">Peruntukan</label>
                                                                <select name="peruntukan" id="peruntukan" class="form-control" disabled>
                                                                    <option value="">Pilih</option>
                                                                    <?php foreach ($all_barang as $komponen) : ?>
                                                                        <option value="<?= $komponen->nama_barang ?>"><?= $komponen->nama_barang ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div> 
															<div class="form-group col-1">
                                                                <label>Jumlah</label>
                                                                <input type="number"  id ="jumlah" name="jumlah" value="" class="form-control" readonly min='1'>
                                                            </div>
                                                            <div class="form-group col-1">
                                                                <label for="">&nbsp;</label>
                                                                <button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                            <input type="hidden" name="satuan" value="">
                                                            <input type="hidden" name="nama_komponen" value=""> 
                                                            <input type="hidden" name="id_barang" value="">
                                                            <input type="hidden" name="stok_alat" value="Timbangan Dewasa">
                                                            <input type="hidden" name="keterangan" value="Antropometri"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="keranjang">
                                                    <h5>Detail Pengeluaran</h5>
                                                    <hr>
                                                    <table class="table table-bordered" id="keranjang">
                                                        <thead>
                                                            <tr>
                                                                <td width="5%">Kode Komponen</td>
                                                                <td width="35%">Nama Komponen</td>
                                                                <td width="10%">Jumlah</td>
                                                                <td width="10%">Satuan</td> 
                                                                <td width="5%">Peruntukan</td>
															    <td width="20%">pengambil</td>
															    <td width="5%">Stok Alat</td>
															    <td width="5%">Keterangan</td>
                                                                <td width="5%">Id Barang</td>
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

            $(document).keypress(function(event) {
                if (event.which == '13') {
                    event.preventDefault();
                }
            })

            $('#kode_komponen').on('change', function() {

                if ($(this).val() == '') reset()
                else {
                    // const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
                    $.ajax({
                        url: "<?= base_url() ?>PurchasingElektro/PengambilanElektro/get_all_barang",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            kode_komponen: $(this).val() 
                        },
                        success: function(data) { 
                            $('input[name="nama_komponen"]').val(data.nama_komponen)
                            $('input[name="jumlah"]').val(1)
                            $('input[name="satuan"]').val(data.satuan)
                            $('select[name="peruntukan"]').val(data.peruntukan)
                            $('input[name="keterangan"]').val(data.keterangan)
                            $('input[name="id_barang"]').val(data.id_barang)
                            $('input[name="max_hidden"]').val(data.stok)
                            $('input[name="jumlah"]').prop('readonly', false)
                            $('select[name="peruntukan"]').prop('disabled', false)
                            $('select[name="pengambil"]').prop('disabled', false)
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
                    kode_komponen: $('select[name="kode_komponen"]').val(),
                    tanggal_masuk: $('input[name="tanggal_masuk"]').val(),
                    nama_komponen: $('input[name="nama_komponen"]').val(),
                    jumlah: $('input[name="jumlah"]').val(),
                    satuan: $('input[name="satuan"]').val(),
                    stok_alat: $('input[name="stok_alat"]').val(),
                    peruntukan: $('select[name="peruntukan"]').val(),
                    keterangan: $('input[name="keterangan"]').val(),
                    pengambil: $('select[name="pengambil"]').val(),
                    id_barang: $('input[name="id_barang"]').val(),
                } 

                $.ajax({
                    url: "<?= base_url() ?>PurchasingElektro/PengambilanElektro/keranjang_barang",
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
                $('#kode_komponen').val('')
                $('input[name="nama_komponen"]').val('') 
                $('select[name="peruntukan"]').val('')
                $('select[name="pengambil"]').val('')
                $('input[name="jumlah"]').val('')
                $('input[name="jumlah"]').prop('readonly', true)
                $('select[name="peruntukan"]').prop('disabled', true)
                $('select[name="pengambil"]').prop('disabled', true)
                $('button#tambah').prop('disabled', true)
            }
        })
    </script>

</body>

</html>