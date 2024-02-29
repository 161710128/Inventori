<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3> 
		</div>
	</div>
	<!-- <hr> -->
	<div class="row">
		<table class="" border="1" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr> 
					<td>No</td>
					<td>Nama Barang</td> 
					<td>Tahun Bulan</td> 
					<td>Jumlah Barang</td>
				</tr>
			</thead>
			<tbody>
				
			<?php foreach ($report as $report): ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $report->NamaBarang ?></td> 
					<td><?= $report->TahunBulan ?></td>
					<td><?= $report->JumlahBarang ?></td> 
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>