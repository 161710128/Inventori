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

    <script
src="https://code.jquery.com/jquery-2.2.4.min.js"
integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>


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
                            <h1 class="float-right"><a href="<?= base_url('PurchasingMekanik/PenerimaanInventaris_Mekanik') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></h1> 	
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
                                        <div class="card-body">
                                            <form action="<?= base_url('PurchasingMekanik/PenerimaanInventaris_Mekanik/proses_tambah1') ?>" id="form-tambah" method="POST">
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
                                                        <label>Tanggal Terima</label>
                                                        <input type="text" name="tanggal_masuk" value="<?= date('d/m/Y') ?>" readonly class="form-control">
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <label>Jam</label>
                                                        <input type="text" name="jam_masuk" value="" readonly class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row"> 
                                                    <div class="col-md-12">
                                                    <br>
                                                        <h5>Data Barang</h5>
                                                        <hr>
                                                        <div class="form-row">
                                                            <div class="form-group col-2">
                                                                <label for="kode_part">Kode Part</label>
                                                                <select name="kode_part" id="kode_part" class="form-control">
                                                                    <option value="">Pilih</option>
                                                                    <?php foreach ($all_komponen as $komponen): ?>
                                                                        <option value="<?= $komponen->kode_part ?>"><?= $komponen->nama_barang ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div> 
                                                            <div class="form-group col-2">
                                                                <label>Spesifikasi</label>
                                                                <input type="text" name="spesifikasi" value="" readonly class="form-control">
                                                            </div> 
                                                            <div class="form-group col-2">
                                                                <label>Keterangan</label>
                                                                <input type="text" name="keterangan" value=""  readonly class="form-control">
                                                            </div>
                                                            <div class="form-group col-1">
                                                                <label>Jumlah</label>
                                                                <input type="number" name="jumlah" value="" class="form-control" readonly min='1'>
                                                            </div> 
                                                            <div class="form-group col-1">
                                                                <label for="">&nbsp;</label>
                                                                <button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                            <input type="hidden" name="satuan" value="">
                                                            <!-- <input type="hidden" name="id_barang" value=""> -->
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
                                                                <td width="15%">Keterangan</td> 
                                                                <td width="10%">Tanggal</td> 
                                                                <td width="10%">Jam</td> 
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
                
                $('input[name="jam_masuk"]').val(jamMasukValue);
            }

            $(document).ready(function () {
                $('#kode_part').select2();
            });
            $('#kode_part').on('change', function() {

                if ($(this).val() == '') reset()
                else {
                    // const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
                    $.ajax({
                        url: "<?= base_url() ?>PurchasingMekanik/PenerimaanInventaris_Mekanik/get_all_barang",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            kode_part: $(this).val()
                        },
                        success: function(data) {
                            $('input[name="nama_barang"]').val(data.nama_barang) 
                            $('input[name="spesifikasi"]').val(data.spesifikasi)
                            $('input[name="jumlah"]').val(1)
                            $('input[name="satuan"]').val(data.satuan)
                            $('input[name="keterangan"]').val(data.keterangan)
                            // $('input[name="kebutuhan"]').val(data.kebutuhan) 
                            $('input[name="max_hidden"]').val(data.stok)
                            $('input[name="jumlah"]').prop('readonly', false)
                            $('input[name="spesifikasi"]').prop('readonly', true) 
                            $('input[name="keterangan"]').prop('readonly', true)
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
                    kode_part: $('select[name="kode_part"]').val(),
                    nama_barang: $('input[name="nama_barang"]').val(),
                    spesifikasi: $('input[name="spesifikasi"]').val(),
                    jumlah: $('input[name="jumlah"]').val(),
                    satuan: $('input[name="satuan"]').val(), 
                    keterangan: $('input[name="keterangan"]').val(),
                    tanggal_masuk: $('input[name="tanggal_masuk"]').val(),
                    jam_masuk: $('input[name="jam_masuk"]').val(),  
                }

                $.ajax({
                    url: "<?= base_url() ?>PurchasingMekanik/PenerimaanInventaris_Mekanik/keranjang_barang",
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
                $('#kode_part').val('')
                $('input[name="nama_komponen"]').val('')
                $('input[name="spesifikasi"]').val('') 
                $('input[name="kebutuhan"]').val('') 
                $('input[name="jumlah"]').val('')
                $('input[name="keterangan"]').val('')
                $('input[name="spesifikasi"]').prop('readonly', true)
                $('input[name="keterangan"]').prop('readonly', true) 
                $('input[name="jumlah"]').prop('readonly', true)
                $('button#tambah').prop('disabled', true)
            }
        })
    </script>

</body>

</html>