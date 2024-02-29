<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $titleHead?></title>

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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">  
          <div class="col-sm-12"> 
            <h1 class="float-left"><?= $title?></h1> 
            <h1 class="float-right"><a href="<?= base_url('GudangBarangJadi/Penerimaan') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></h1> 	
          </div>
        </div>
        <!-- /.row -->
		<hr>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Isi Form dibawah Ini !</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form action="<?= base_url('GudangBarangJadi/Penerimaan/proses_detailHapus/' . $barang->kode_komponen) ?>" id="form-tambah" method="POST"> -->
              <form action="<?= base_url('GudangBarangJadi/Penerimaan/proses_detailHapus') ?>" id="form-tambah" method="POST">
                <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="kode_komponen"><strong>Kode Komponen</strong></label>
                        <input type="text" name="kode_komponen" placeholder="Masukkan Kode Barang" autocomplete="off"  class="form-control" required value="<?= $barang->kode_komponen ?>" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="nama_komponen"><strong>Nama Barang</strong></label>
                        <input type="text" name="nama_komponen" placeholder="Masukkan Nama Komponen" autocomplete="off"  class="form-control" required value="<?= $barang->nama_komponen ?>" readonly>
                      </div>
                    </div>   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="jumlah"><strong>Jumlah</strong></label>
                          <input type="text" name="jumlah" placeholder="Masukkan Harga Satuan" autocomplete="off"  class="form-control" required value="<?= $barang->jumlah ?>"readonly>
                        </div>	
                        <div class="form-group col-md-6">
                          <label for="qty_unit"><strong>Waktu</strong></label>
                          <input type="text" name="qty_unit" placeholder="Masukkan QTY /Unit" autocomplete="off"  class="form-control" required value="<?= $barang->tanggal?> - <?= $barang->jam?>" readonly>
                        </div>
                    </div>   
                    <!-- <div class="form-row"> 
                      <div class="form-group col-md-6">
                        <label for="harga_satuan"><strong>Harga Satuan</strong></label>
                        <input type="text" name="harga_satuan" placeholder="Masukkan Harga Satuan" autocomplete="off"  class="form-control" required value="<?= $barang->harga_satuan ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="satuan"><strong>Satuan</strong></label>
                        <select name="satuan" id="satuan" class="form-control" required>
                          <option value="">Pilih Satuan</option>
                          <option value="liter" <?= $barang->satuan == 'liter' ? 'selected' : '' ?>>Liter</option>
                          <option value="meter" <?= $barang->satuan == 'meter' ? 'selected' : '' ?>>Meter</option>
                          <option value="rol" <?= $barang->satuan == 'rol' ? 'selected' : '' ?>>Rol</option>
                          <option value="pcs" <?= $barang->satuan == 'pcs' ? 'selected' : '' ?>>Pcs</option>  
                          <option value="batang" <?= $barang->satuan == 'batang' ? 'selected' : '' ?>>Batang</option>  
                          <option value="lembar" <?= $barang->satuan == 'lembar' ? 'selected' : '' ?>>Lembar</option>  
                        </select>
                      </div> 
                    </div>
                    <div class="form-row">  
                      <div class="form-group col-md-6">
                        <label for="total_stok"><strong>Total Stok</strong></label>
                        <input type="number" name="total_stok" placeholder="Masukkan Stok" autocomplete="off"  class="form-control" required value="<?= $barang->total_stok ?>">
                      </div> 
                      <div class="form-group col-md-6">
                          <label for="kebutuhan"><strong>Kebutuhan</strong></label>
                          <select name="kebutuhan" id="kebutuhan" class="form-control" required>
                            <option value="">Pilih Kebutuhan</option>
                            <option value="assembly" <?= $barang->kebutuhan == 'assembly' ? 'selected' : '' ?>>Assembly</option>
                            <option value="set kaki" <?= $barang->kebutuhan == 'set kaki' ? 'selected' : '' ?>>Set Kaki</option>
                            <option value="elektro" <?= $barang->kebutuhan == 'elektro' ? 'selected' : '' ?>>Elektro</option>
                            <option value="packing" <?= $barang->kebutuhan == 'packing' ? 'selected' : '' ?>>Packing</option>  
                            <option value="material" <?= $barang->kebutuhan == 'material' ? 'selected' : '' ?>>Material</option>  
                            <option value="tiang" <?= $barang->kebutuhan == 'tiang' ? 'selected' : '' ?>>Tiang</option>  
                          </select>
                        </div> 
                    </div> 
                    <div class="form-row">  
                      <div class="form-group col-md-6">
                        <label for="keterangan"><strong>Keterangan</strong></label>
                        <input type="text" name="keterangan" placeholder="Nama Toko" autocomplete="off"  class="form-control" required value="<?= $barang->keterangan ?>">
                      </div> 
                      <div class="form-group col-md-6">
                        <label for="nama_toko"><strong>Nama Toko</strong></label>
                        <input type="text" name="nama_toko" placeholder="Nama Toko" autocomplete="off"  class="form-control" required value="<?= $barang->nama_toko ?>">
                      </div>
                    </div>   
                    <input type="hidden" name="id_barang" value="<?= $barang->id_barangm ?>">
                    <input type="hidden" name="stok_alat" value="<?= $barang->stok_alat ?>"> 
                    </div> -->
                <!-- /.card-body -->

                <input type="hidden" name="id_detail" value="<?= $barang->id_detail ?>"> 
                <div class="card-footer">
				            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</button>
										<!-- <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> -->
                </div>
              </form>
            </div>
            <!-- /.card -->
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
</body>
</html>
