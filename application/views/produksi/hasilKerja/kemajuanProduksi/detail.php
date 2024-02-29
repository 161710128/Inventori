<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $titleHead ?> - <?= $penerimaan->tanggal ?></title>

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
  <!-- Tambahkan link CSS SweetAlert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
     -->
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
	  <div class="float-right">
 						<a href="<?= base_url('Produksi/StokAlat') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
        <div class="row mb-2">
          	<div class="col-sm-6"> 
            	<h1 class="m-0"><?= $title?></h1>
			</div>
          <!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
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
		<div class="card">
					<div class="card-header">
            <strong><?= $title ?> - <?= $penerimaan->kode_transaksi ?></strong>
            <div class="float-right">
            <a class="btn btne btn-secondary btn-sm" id="catatanButton" onclick="showTwoTextAreaDialog('<?= $penerimaan->kode_transaksi ?>')" ><i class="fa"></i>&nbsp;&nbsp;Catatan</a>
            <a class="btn btne btn-secondary btn-sm" id="editCatatanButton" onclick="getTwoTextAreaDialog('<?= $penerimaan->kode_transaksi ?>')"  ><i class="fa"></i>&nbsp;&nbsp;Edit Catatan</a>

            <!-- <textarea id="myTextArea" style="display: none;"></textarea> -->
					</div>
            <!-- <div class="float-right">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tampilkan Data</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"> 
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">All</a></li>    
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail_standingWeight/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">Standing Weight</a></li>    
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail_babyScale/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">Baby Scale</a></li>    
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail_stadioMeter/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">Stadio Meter</a></li>    
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail_infantoMeter/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">Infanto Meter</a></li>    
                <li><a href="<?= base_url('Produksi/KemajuanProduksi/detail_lila/' . $penerimaan->kode_transaksi)?>" class="dropdown-item">Lila</a></li>    
              </ul>
            </div> -->
          </div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<table class="table table-borderless">
									<tr>
										<td><strong>No Transaksi</strong></td>
										<td>:</td>
										<td><?= $penerimaan->kode_transaksi ?></td>
									</tr>
									<tr>
										<td><strong>Nama Petugas</strong></td>
										<td>:</td>
										<td><?= $penerimaan->nama_pengguna ?></td>
									</tr>
									<tr>
										<td><strong>Tanggal Transaksi</strong></td>
										<td>:</td>
										<td><?= $penerimaan->tanggal ?> - <?= $penerimaan->jam ?></td>
									</tr>
								</table>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered" id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
                      <th><strong>No</strong></th> 
                      <th><strong>Kode Alat</strong></th>
                      <th><strong>Nama Alat</strong></th>
                      <th><strong>Jumlah Assembly</strong></th>
                      <th><strong>Keterangan</strong></th>
                      <th><strong>Status Alat</strong></th>
                      <th><strong>Nama Shift</strong></th> 
                      <th><strong></strong></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($all_detail_terima as $detail_terima): ?>
											<tr>
												<td><?= $no++ ?></td> 
												<td><?= $detail_terima->kode_alat ?></td> 
												<td><?= $detail_terima->nama_alat ?></td> 
												<td><?= $detail_terima->jumlah_assy ?></td> 
												<td><?= $detail_terima->keterangan ?></td> 
												<td><?= $detail_terima->status_alat ?></td> 
												<td><?= $detail_terima->nama_shift ?></td>
                        <td><a href="<?= base_url('Produksi/StokAlat/detailHapus/' . $detail_terima->id_detail_alat) ?>"  class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a></td>
                        <!-- <td><a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('Produksi/KemajuanProduksi/detailHapus/' . $detail_terima->id_detailmasuk) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td> -->
											</tr>
										<?php endforeach ?>
									</tbody>
									<tfoot>
                    <tr>
                      <th><strong>No</strong></th> 
                      <th><strong>Kode Alat</strong></th>
                      <th><strong>Nama Alat</strong></th>
                      <th><strong>Jumlah Assembly</strong></th>
                      <th><strong>Keterangan</strong></th>
                      <th><strong>Status Alat</strong></th>
                      <th><strong>Nama Shift</strong></th> 
                      <th><strong></strong></th>
										</tr>
									</tfoot>
								</table>
                <textarea class="form-control" rows="10" style="margin-top: 10px;"readonly>
Catatan Mekanik: 
<?=$lihat_catatan -> catatan_mekanik ?? ''?>

            

Catatan Elektro: 
<?=$lihat_catatan -> catatan_elektro ?? ''?>
                </textarea>
							</div>
						</div>
					</div>
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

<style>
    .btne {
        /* Your existing button styles */
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        text-decoration: none;
        color: #fff; /* Set the text color */
        background-color: #007bff; /* Set the button color */
        
    }
    #editCatatanButton {
    display: none; /* menyembunyikan tombol secara default */
  }
    @media (max-width: 768px) {
    /* Adjust the dialog width on smaller screens */
    .swal2-popup {
      width: 90% !important;
    }

    /* Adjust the textarea width on smaller screens */
    #myTextArea1,
    #myTextArea2 {
      width: 100%;
    }

    /* Flexbox for better layout and spacing */
    .swal2-content {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }
    .swal2-content label {
      margin-bottom: 5px;
    }
  }

</style>
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

<!-- Tambahkan script SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

<!-- <script>
  function showTwoTextAreaDialog() {
    Swal.fire({
      title: 'Masukkan Catatan',
      html: '<label for="myTextArea1">Catatan Mekanik:</label><br><textarea id="myTextArea1" rows="4" cols="50"></textarea><br><label for="myTextArea2">Catatan Elektro:</label><br><textarea id="myTextArea2" rows="4" cols="50"></textarea>',
      confirmButtonText: 'Simpan',
      customClass: {
        confirmButton: 'btne btn-success' // Menambahkan kelas CSS 'btn-success' untuk tombol "Simpan"
      },
      preConfirm: function () {
        const textarea1 = document.getElementById('myTextArea1').value;
        const textarea2 = document.getElementById('myTextArea2').value;
        return [textarea1, textarea2];
      }
    }).then((result) => {
      if (result.isConfirmed) {
        // Lakukan sesuatu dengan nilai hasil dari textarea (result.value)
        const [value1, value2] = result.value;
        console.log('Catatan Mekanik:', value1);
        console.log('Catatan Elektro:', value2);

        // Send the data to the server using AJAX
        $.ajax({
          type: 'POST',
          url: '<?= base_url() ?>Produksi/StokAlat/catatan',
          data: {
           
            catatan_mekanik: value1,
            catatan_elektro: value2
          },
          success: function (response) {
            Swal.fire('Success', 'Data saved successfully.', 'success');
            // Handle the server response here if needed
            console.log('Data saved successfully.');
          },
          error: function (xhr, status, error) {
            Swal.fire('Error', 'Failed to save data. Please try again later.', 'error');
            // Handle errors, if any
            console.error('Error saving data:', error);
          }
        });
      }
    });
  }
</script> -->

<script>
  function showTwoTextAreaDialog(kode_transaksi) {
    Swal.fire({
      title: 'Masukkan Catatan',
      html: '<label for="myTextArea1">Catatan Mekanik:</label><br><textarea id="myTextArea1" rows="4" cols="50"></textarea><br><label for="myTextArea2">Catatan Elektro:</label><br><textarea id="myTextArea2" rows="4" cols="50"></textarea>',
      confirmButtonText: 'Simpan',
      customClass: {
        confirmButton: 'btne btn-success' // Menambahkan kelas CSS 'btn-success' untuk tombol "Simpan"
      },
      preConfirm: function () {
        const textarea1 = document.getElementById('myTextArea1').value;
        const textarea2 = document.getElementById('myTextArea2').value;
        return [textarea1, textarea2];
      }
    }).then((result) => {
      if (result.isConfirmed) {
        // Lakukan sesuatu dengan nilai hasil dari textarea (result.value)
        const [value1, value2] = result.value;
        console.log('Catatan Mekanik:', value1);
        console.log('Catatan Elektro:', value2);
        console.log('Kode Transaksi:', kode_transaksi);

        // Send the data to the server using AJAX
        $.ajax({
          type: 'POST',
          url: '<?= base_url() ?>Produksi/StokAlat/catatan',
          data: {
            kode_transaksi: kode_transaksi,
            catatan_mekanik: value1,
            catatan_elektro: value2
          },
          success: function (response) {
            Swal.fire('Success', 'Data saved successfully.', 'success').then(() => {
              // Reload the page after the "OK" button is clicked
              location.reload();
            });
            // Handle the server response here if needed
            console.log('Data saved successfully.');
          },
          error: function (xhr, status, error) {
            Swal.fire('Error', 'Failed to save data. Please try again later.', 'error');
            // Handle errors, if any
            console.error('Error saving data:', error);
          }
        });
      }
    });
  }
</script>

<!-- <script>
  function getTwoTextAreaDialog(kode_transaksi) {
    const catatanMekanik = `<?= str_replace(["'", "\r\n", "\r", "\n"], ["\\'", "\n", "\n", "\\n"], addslashes($lihat_catatan->catatan_mekanik)) ?>`;
    const catatanElektro = `<?= str_replace(["'", "\r\n", "\r", "\n"], ["\\'", "\n", "\n", "\\n"], addslashes($lihat_catatan->catatan_elektro)) ?>`;

    function convertLineBreaksToHtml(text) {
      return text.replace(/\n/g, '<br>');
    }

    Swal.fire({
      title: 'Catatan Mekanik dan Elektro',
      html: `
        <label for="myTextArea1">Catatan Mekanik:</label><br>
        <textarea id="myTextArea1" rows="4" cols="50" >${catatanMekanik}</textarea><br>
        <label for="myTextArea2">Catatan Elektro:</label><br>
        <textarea id="myTextArea2" rows="4" cols="50" >${catatanElektro}</textarea>`,
      confirmButtonText: 'OK',
      customClass: {
        confirmButton: 'btne btn-success' // Menambahkan kelas CSS 'btn-success' untuk tombol "OK"
      }
    });
  }
</script> -->

<script>
  function getTwoTextAreaDialog(kode_transaksi) {
    const catatanMekanik = `<?= str_replace(["'", "\r\n", "\r", "\n"], ["\\'", "\n", "\n", "\\n"], addslashes($lihat_catatan->catatan_mekanik)) ?>`;
    const catatanElektro = `<?= str_replace(["'", "\r\n", "\r", "\n"], ["\\'", "\n", "\n", "\\n"], addslashes($lihat_catatan->catatan_elektro)) ?>`;

    function convertLineBreaksToHtml(text) {
      return text.replace(/\n/g, '<br>');
    }

    Swal.fire({
      title: 'Catatan Mekanik dan Elektro',
      html: `
        <label for="myTextArea1">Catatan Mekanik:</label><br>
        <textarea id="myTextArea1" rows="4" cols="50" >${catatanMekanik}</textarea><br>
        <label for="myTextArea2">Catatan Elektro:</label><br>
        <textarea id="myTextArea2" rows="4" cols="50" >${catatanElektro}</textarea>`,
      confirmButtonText: 'OK',
      customClass: {
        confirmButton: 'btne btn-success' // Menambahkan kelas CSS 'btn-success' untuk tombol "OK"
      },
      preConfirm: function () {
        const textarea1 = document.getElementById('myTextArea1').value;
        const textarea2 = document.getElementById('myTextArea2').value;
        return [textarea1, textarea2];
      }
    }).then((result) => {
      // This function will run when the "OK" button is clicked
      if (result.isConfirmed) {
        const [value1, value2] = result.value;
        console.log('Catatan Mekanik:', value1);
        console.log('Catatan Elektro:', value2);
        console.log('Kode Transaksi:', kode_transaksi);
        
        $.ajax({
          type: 'POST',
          url: '<?= base_url() ?>Produksi/StokAlat/proses_ubahCatatan',
          data: {
            kode_transaksi: kode_transaksi,
            catatan_mekanik: value1,
            catatan_elektro: value2
          },
          success: function (response) {
            // location.reload();
            Swal.fire({
            title: 'Success',
            text: 'Data saved successfully.',
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                // Reload the page after "OK" button is clicked
                location.reload();
            }
        });
            // Handle the server response here if needed
            console.log('Data saved successfully.');
            
          },
          error: function (xhr, status, error) {
            Swal.fire({
            title: 'Error',
            text: 'Failed to save data. Please try again later.',
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                // Reload the page after "OK" button is clicked
                location.reload();
            }
        });
            // Handle errors, if any
            console.error('Error saving data:', error);
          }
        });
      }
    });
  }
</script>

<script>
  // Mendapatkan nilai catatan_mekanik dan catatan_elektro dari textarea
  var catatanMekanik = <?=$lihat_catatan->catatan_mekanik ? json_encode($lihat_catatan->catatan_mekanik) : ''?>;
  var catatanElektro = <?=$lihat_catatan->catatan_elektro ? json_encode($lihat_catatan->catatan_elektro) : ''?>;

  // Mendapatkan button berdasarkan ID
  var myButton = document.getElementById("catatanButton");
  var button1 = document.getElementById("editCatatanButton");

  // Fungsi untuk mengatur visibilitas button
  function toggleButtonVisibility() {
    if (catatanMekanik || catatanElektro) {
      myButton.style.display = "none"; // Menghilangkan myButton jika ada nilai catatan_mekanik atau catatan_elektro
      button1.style.display = "inline-block"; // Menampilkan button1 jika myButton disembunyikan
    } else {
      myButton.style.display = "inline-block"; // Menampilkan myButton jika catatan_mekanik dan catatan_elektro bernilai null
      button1.style.display = "none"; // Menghilangkan button1 jika myButton ditampilkan
    }
  }
  
  // Panggil fungsi toggleButtonVisibility() saat halaman dimuat
  toggleButtonVisibility();
</script>

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