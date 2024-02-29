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
            <h1 class="float-right"><a href="<?= base_url('PurchasingMekanik/BarangPinjam_Mekanik') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a></h1> 	
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
              <form action="<?= base_url('PurchasingMekanik/BarangPinjam_Mekanik/proses_tambah') ?>" id="form-tambah" method="POST">
                <div class="card-body">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="kode_part"><strong>Kode Part</strong></label>
							<input type="text" name="kode_part" placeholder="Masukkan Kode Barang" autocomplete="off"  class="form-control" required value="" maxlength="8" readonly>
						</div>
							<div class="form-group col-md-6">
							<label for="nama_barang"><strong>Nama Barang</strong></label>
							<input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang" autocomplete="off" class="form-control" required>
							<div id="history_nama_barang"></div>
						</div>
					</div> 
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="spesifikasi"><strong>Spesifikasi Barang</strong></label>
							<input type="text" name="spesifikasi" placeholder="Masukkan Spesifikasi" autocomplete="off"  class="form-control" required>
						</div>
					<div class="form-group col-md-6">
								<label for="total_stok"><strong>Merk</strong></label>
								<input type="text" name="merk"  placeholder="Masukkan Merk" autocomplete="off"  class="form-control" required >
							</div> 
						</div>   
						<div class="form-row">
						<div class="form-group col-md-6">
							<label for="satuan"><strong>Satuan</strong></label>
							<select name="satuan" id="satuan" class="form-control" required>
								<option value="">Pilih Satuan</option> 
								<option value="pcs">PCS</option> 
								<option value="set">Set</option> 
							</select>
						</div> 
						<div class="form-group col-md-6" hidden>
								<label for="total_stok"><strong>Total Stok</strong></label>
								<input type="number" name="total_stok" readonly autocomplete="off"  class="form-control" required value=1>
						</div> 
					</div>   
                </div>
                <!-- /.card-body --> 
                <div class="card-footer">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
					<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
    // $(document).ready(function () {
        // $('input[name="nama_barang"]').on('input', function () {
            // // Get the first three letters from the nama_barang
            // var prefix = $(this).val().substring(0, 4).toUpperCase();
            
            // // Update the kode_part value
            // $('input[name="kode_part"]').val(prefix + '<?php echo sprintf("_%04s", $kode_part) ?>');
        // });
    // });
	
// $(document).ready(function () {
//     $('input[name="nama_barang"]').on('input', function () {
//         var nama_barang = $(this).val();
        
//         // Hilangkan spasi dari nama_barang
//         var nama_barang_tanpa_spasi = nama_barang.replace(/\s/g, '');

//         var nama_barang_prefix = nama_barang_tanpa_spasi.substring(0, 4).toUpperCase();

//         $.ajax({
//             url: '<?php echo base_url('PurchasingMekanik/BarangPinjam_Mekanik/cekkodebarang/'); ?>' + nama_barang_prefix,
//             type: 'GET',
//             dataType: 'json',
//             success: function (data) {
//                 console.log(data); // Log the response for debugging

//                 if (data.success) {
//                     var nextNumber = data.count + 1;
//                     var kodePart = nama_barang_prefix + '_' + nextNumber.toString().padStart(4, '0');
//                     $('input[name="kode_part"]').val(kodePart);
//                 } else {
//                     console.error('Failed to fetch kode_barang count.');
//                 }
//             },
//             error: function (xhr, status, error) {
//                 console.error('AJAX error:', error);
//             }
//         });
//     });
// });
	$(document).ready(function () {
		$('input[name="nama_barang"]').on('input', function () {
			var nama_barang = $(this).val();

			// Remove spaces from nama_barang
			var nama_barang_tanpa_spasi = nama_barang.replace(/\s/g, '');

			var nama_barang_prefix = nama_barang_tanpa_spasi.substring(0, 4).toUpperCase();

			$.ajax({
				url: '<?php echo base_url('PurchasingMekanik/BarangPinjam_Mekanik/cekkodebarang/'); ?>' + nama_barang_prefix,
				type: 'GET',
				dataType: 'json',
				success: function (data) {
					console.log(data); // Log the response for debugging

					if (data.success) {
						// Updated handling of nextNumber
						var nextNumber = (data.count !== null) ? data.count + 1 : 1;
						var kodePart = nama_barang_prefix + '_' + nextNumber.toString().padStart(4, '0');
						$('input[name="kode_part"]').val(kodePart);
					} else {
						console.error('Failed to fetch kode_barang count.');
					}
				},
				error: function (xhr, status, error) {
					console.error('AJAX error:', error);
				}
			});
		});
	});



    $(document).ready(function () {
        var historyData = JSON.parse(localStorage.getItem('historyData')) || [];

        $('#nama_barang').on('input', function () {
            var inputText = $(this).val().toLowerCase().trim();

            if (inputText === '') {
                $('#history_nama_barang').empty();
                return;
            }

            var filteredHistory = historyData.filter(function (item) {
                return item.toLowerCase().includes(inputText);
            });

            var historyList = '<ul>';
            for (var i = 0; i < filteredHistory.length; i++) {
                historyList += '<li class="history-item">' + filteredHistory[i] + '</li>';
            }
            historyList += '</ul>';

            $('#history_nama_barang').html(historyList);
        });

        $(document).on('click', '.history-item', function () {
            var selectedValue = $(this).text();
            $('#nama_barang').val(selectedValue);
            $('#history_nama_barang').empty();
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest('.history-item').length && !$(e.target).is('#nama_barang')) {
                $('#history_nama_barang').empty();
            }
        });

        $('#form-tambah').on('submit', function () {
            var newNamaBarang = $('#nama_barang').val().trim();
            if (newNamaBarang !== '' && historyData.indexOf(newNamaBarang) === -1) {
                historyData.push(newNamaBarang);
            }
            localStorage.setItem('historyData', JSON.stringify(historyData));
        });
    });
	
	
	$(document).on('click', '.history-item', function () {
    var selectedValue = $(this).text();
    $('#nama_barang').val(selectedValue);
    $('#history_nama_barang').empty();

    // Pembaruan kode barang sesuai dengan nama barang yang dipilih
    updateKodeBarang(selectedValue);
});

function updateKodeBarang(nama_barang) {
    // Hilangkan spasi dari nama_barang
    var nama_barang_tanpa_spasi = nama_barang.replace(/\s/g, '');
    var nama_barang_prefix = nama_barang_tanpa_spasi.substring(0, 4).toUpperCase();

    $.ajax({
        url: '<?php echo base_url('PurchasingMekanik/BarangPinjam_Mekanik/cekkodebarang/'); ?>' + nama_barang_prefix,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);

            if (data.success) {
                var nextNumber = data.count + 1;
                var kodePart = nama_barang_prefix + '_' + ('00000' + nextNumber).slice(-4);
                $('input[name="kode_part"]').val(kodePart);
            } else {
                console.error('Failed to fetch kode_barang count.');
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX error:', error);
        }
    });
}


</script>

</body>
</html>
