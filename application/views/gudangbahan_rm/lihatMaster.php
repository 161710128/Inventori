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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
		
      <div class="container-fluid">
		<!-- <h3 class="m-0 float-right"><a href="<?= base_url('PurchasingMekanik/BarangInventaris_Mekanik/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></h3>  -->
		<h1 class="m-0"><?= $title?></h1> 
      </div>
	  <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<br>
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
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tampilkan Jenis Komponen</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                      <li><a href="<?= base_url('GudangBahanRM/DataMaster') ?>" class="dropdown-item">All</a></li>
                      <li><a href="<?= base_url('GudangBahanRM/DataMaster/perekat') ?>" class="dropdown-item">Perekat</a></li>
                      <li><a href="<?= base_url('GudangBahanRM/DataMaster/bautMur') ?>" class="dropdown-item">Baut dan Mur</a></li> 
                      <li><a href="<?= base_url('GudangBahanRM/DataMaster/rawMaterial') ?>" class="dropdown-item">Raw Material</a></li> 
                      <li><a href="<?= base_url('GudangBahanRM/DataMaster/komponenElektro') ?>" class="dropdown-item">Komponen Elektro</a></li> 
                      <li><a href="<?= base_url('GudangBahanRM/DataMaster/komponenMekanik') ?>" class="dropdown-item">Komponen Mekanik</a></li> 
                      <li><a href="<?= base_url('GudangBahanRM/DataMaster/setJadi') ?>" class="dropdown-item">SetJadi dan Proses Pemesinan</a></li> 
                      <li><a href="<?= base_url('GudangBahanRM/DataMaster/percetakan') ?>" class="dropdown-item">Percetakan, Pengecatan, dan Cairan</a></li> 
                    </ul>
                <h3 class="card-title float-right"><a href="<?= base_url('GudangBahanRM/DataMaster/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a></h3> 
            </div>
			  	
          <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Komponen</th>
                        <th>Nama komponen</th>
                        <th>Spesifikasi</th>
                        <th>Qty /Unit</th>
                        <!-- <th>Harga Satuan</th> -->
                        <th>Satuan</th>
                        <th>Total Stok</th> 
                        <!-- <th>Nama Toko</th> -->
                        <th>Kebutuhan</th>
                        <!-- <th>Tipe Barang</th> -->
                        <th>Stok Minimal</th>
                        <th>Jenis Komponen</th>
                        <th>Keterangan</th>
                        <th>Keterangan Barang</th>
                        <th>&emsp;&emsp;&emsp;&emsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($all_barang as $barang): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $barang->kode_komponen?></td>
                          <td><?= $barang->nama_komponen?></td> 
                          <td><?= $barang->spesifikasi?></td> 
                          <td><?= $barang->qty_unit?></td> 
                          <!-- <td><?= rupiah($barang->harga_satuan) ?></td> -->
                          <td><?= strtoupper($barang->satuan) ?></td> 
                          <td><?= $barang->total_stok ?></td> 
                          <!-- <td><?= $barang->nama_toko ?></td>  -->
                          <td><?= $barang->kebutuhan ?></td> 
                          <!-- <td><?= $barang->type_barang ?></td>  -->
                          <td><?= $barang->stok_minimal ?></td> 
                          <td><?= $barang->jenis_komponen ?></td> 
                          <td><?= $barang->keterangan ?></td> 
                          <td><?= $barang->keterangan_barang ?></td> 
                          <td>
                          <?php if ($this->session->login['role'] == 'super' || $this->session->login['role'] == 'mekanik' || $this->session->login['role'] == 'supervisor') : ?>
                            <a href="<?= base_url('GudangBahanRM/DataMaster/ubah/' . $barang->kode_komponen) ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                            <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('GudangBahanRM/DataMaster/hapus/' . $barang->kode_komponen) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <?php endif; ?>
                          </td> 
                        </tr> 
                      <?php endforeach ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Kode Komponen</th>
                        <th>Nama komponen</th>
                        <th>Spesifikasi</th>
                        <th>Qty /Unit</th>
                        <!-- <th>Harga Satuan</th> -->
                        <th>Satuan</th>
                        <th>Total Stok</th> 
                        <!-- <th>Nama Toko</th> -->
                        <th>Kebutuhan</th>
                        <!-- <th>Tipe Barang</th> -->
                        <th>Stok Minimal</th>
                        <th>Jenis Komponen</th>
                        <th>Keterangan</th>
                        <th>Keterangan Barang</th>
                        <th>&emsp;&emsp;&emsp;</th>
                      </tr>
                    </tfoot>
                	</table>
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

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
