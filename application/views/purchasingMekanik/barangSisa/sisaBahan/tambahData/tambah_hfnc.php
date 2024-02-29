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
                            <h2>
                                <div class="float-right"><a href="<?= base_url('PurchasingMekanik/SisaBahan') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></div>
                            </h2>
                            <h1 class="float-left"><?= $title ?></h1>
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
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <!-- <h3 class="card-title">
                                                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tampilkan Data</a>
                                                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                                    <li><a href="<?= base_url('PurchasingMekanik/SisaBahan/tambah_hfnc') ?>" class="dropdown-item">HFNC</a></li> 
                                                    <li><a href="<?= base_url('PurchasingMekanik/SisaBahan/tambah_antropometri') ?>" class="dropdown-item">Antropometri</a></li> 
                                                </ul>
                                            </h3>   -->
                                            <!-- <div class="float-right"><a href="<?= base_url('PurchasingMekanik/SisaBahan') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></div> -->
                                            <h3 class="card-title"><strong>Silahkan Isi Data dibawah !</strong></h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?= base_url('PurchasingMekanik/SisaBahan/proses_tambahBahan_hfnc') ?>" id="form-tambah" method="POST">
                                                <h5>Data Pengguna</h5>
                                                <hr>
                                                <div class="form-row">
													<div class="form-group col-2">
														<label>Kode Transaksi</label>
														<input type="text" name="kode_transaksi" value="MB<?php echo sprintf("%03s", $kode_transaksi) ?>" readonly class="form-control">
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
														<input type="text" name="tanggal_keluar" value="<?= date('Y/m/d') ?>" readonly class="form-control">
													</div>
													<div class="form-group col-2">
														<label>Jam</label>
														<input type="text" name="jam_keluar" value="" readonly class="form-control">
													</div>
												</div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>Data Barang</h5>
                                                        <hr>
                                                        <div class="form-row">
                                                            <div class="form-group col-2">
                                                                <label for="kode_komponen">Nama Barang</label>
                                                                <select name="kode_komponen" id="kode_komponen" class="form-control">
                                                                    <option value="">Pilih</option>
                                                                    <?php foreach ($all_barangHFNC as $komponen) : ?>
                                                                        <option value="<?= $komponen->kode_komponen ?>"><?= $komponen->nama_komponen ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div> 
                                                            <div class="form-group col-2">
                                                                <label>Spesifikasi</label>
                                                                <input type="text" name="spesifikasi" value="" class="form-control" readonly>
                                                            </div>
                                                            <!-- <div class="form-group col-1">
                                                                <label>Qty /Unit</label>
                                                                <input type="text" name="qty_unit" value="" class="form-control" readonly>
                                                            </div> -->
                                                            <div class="form-group col-1">
                                                                <label>Kebutuhan</label>
                                                                <input type="text" name="kebutuhan" value="" class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group col-2">
                                                                <label>Ukuran</label>
                                                                <input type="text" name="jumlah" value="" class="form-control" readonly>
                                                            </div> 
															<!-- <div class="form-group col-1">
                                                                <label for="peruntukan">Peruntukan</label>
                                                                <select name="peruntukan" id="peruntukan" class="form-control" disabled>
                                                                    <option value="">Pilih</option>
                                                                    <?php foreach ($all_barang as $komponen1) : ?>
                                                                        <option value="<?= $komponen1->nama_barang ?>"><?= $komponen1->nama_barang ?></option>
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
															</div>  -->
                                                            <div class="form-group col-1">
                                                                <label for="">&nbsp;</label>
                                                                <button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                            <input type="hidden" name="satuan" value="">
                                                            <input type="hidden" name="nama_komponen" value="">
                                                            <input type="hidden" name="id_barang" value="<?= $komponen->id_barangm ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="keranjang">
                                                    <h5>Detail Pengeluaran</h5>
                                                    <hr>
                                                    <table class="table table-bordered" id="keranjang">
                                                        <thead>
                                                            <tr>
                                                                <td width="15%">Kode Komponen</td>
                                                                <td width="30%">Nama Komponen</td>
                                                                <td width="15%">Spesifikasi</td>
                                                                <td width="15%">Ukuran</td>
                                                                <td width="10%">Satuan</td> 
                                                                <!-- <td width="10%">Peruntukan</td>
															    <td width="25%">pengambil</td> -->
															    <td width="5%">Tanggal</td>
															    <td width="5%">Jam</td>
															    <td width="5%">Id Barang</td>
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
                
                $('input[name="jam_keluar"]').val(jamMasukValue);
            }

            $(document).ready(function () {
                $('#kode_komponen').select2();
            });
            
                
            $('#kode_komponen').on('change', function() { 
                if ($(this).val() == '') reset()
                else {
                    // const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
                    $.ajax({
                        url: "<?= base_url() ?>PurchasingMekanik/SisaBahan/get_all_barang",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            kode_komponen: $(this).val()
                        },
                        success: function(data) {
                            $('input[name="nama_komponen"]').val(data.nama_komponen) 
                            $('input[name="spesifikasi"]').val(data.spesifikasi) 
                            $('input[name="qty_unit"]').val(data.qty_unit) 
                            $('input[name="kebutuhan"]').val(data.kebutuhan) 
                            $('input[name="jumlah"]').val()
                            $('input[name="satuan"]').val(data.satuan) 
                            $('input[name="max_hidden"]').val(data.stok)
                            $('input[name="jumlah"]').prop('readonly', false)
                            // $('select[name="peruntukan"]').prop('disabled', false)
                            // $('select[name="pengambil"]').prop('disabled', false)
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
                // const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
                const data_keranjang = {
                    kode_komponen: $('select[name="kode_komponen"]').val(),
                    nama_komponen: $('input[name="nama_komponen"]').val(),
                    jumlah: $('input[name="jumlah"]').val(),
                    satuan: $('input[name="satuan"]').val(), 
                    // peruntukan: $('select[name="peruntukan"]').val(),
                    // pengambil: $('select[name="pengambil"]').val(),
                    tanggal: $('input[name="tanggal_keluar"]').val(),
                    jam: $('input[name="jam_keluar"]').val(),
                    id_barang: $('input[name="id_barang"]').val(),
                    spesifikasi: $('input[name="spesifikasi"]').val(),
                }

                $.ajax({
                    url: "<?= base_url() ?>PurchasingMekanik/SisaBahan/keranjang_barang",
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
                $('select[name="nama_komponen"]').val('') 
                // $('select[name="peruntukan"]').val('')
                // $('select[name="peruntukan"]').prop('disabled', true)
                // $('select[name="pengambil"]').val('')
                // $('select[name="pengambil"]').prop('disabled', true)
                $('input[name="jumlah"]').val('')
                $('input[name="jumlah"]').prop('readonly', true) 
                $('input[name="spesifikasi"]').val('')
                $('input[name="spesifikasi"]').prop('readonly', true) 
                $('input[name="qty_unit"]').val('')
                $('input[name="qty_unit"]').prop('readonly', true) 
                $('input[name="kebutuhan"]').val('')
                $('input[name="kebutuhan"]').prop('readonly', true) 
                $('button#tambah').prop('disabled', true)
            }
        })
    </script>

</body>

</html>