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
					<td>Kode Transaksi</td>
					<td>Nama Pengguna</td>
					<td>Tanggal Terima</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_penerimaan as $penerimaan): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $penerimaan->kode_transaksi ?></td>
						<td><?= $penerimaan->nama_pengguna ?></td>
						<td><?= $penerimaan->tanggal_masuk ?> <?= $penerimaan->jam_masuk ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>