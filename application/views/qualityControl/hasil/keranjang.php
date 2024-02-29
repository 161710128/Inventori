<tr class="row-keranjang">
	<td class="kode_alat">
		<?= $this->input->post('kode_alat') ?>
		<input type="hidden" name="kode_alat_hidden[]" value="<?= $this->input->post('kode_alat') ?>">
	</td>
	<td class="nama_alat">
		<?= $this->input->post('nama_alat') ?>
		<input type="hidden" name="nama_alat_hidden[]" value="<?= $this->input->post('nama_alat') ?>">
	</td> 
	<td class="total_accept">
		<?= $this->input->post('total_accept') ?>
		<input type="hidden" name="total_accept_hidden[]" value="<?= $this->input->post('total_accept') ?>">
	</td>
	<td class="total_reject">
		<?= $this->input->post('total_reject') ?>
		<input type="hidden" name="total_reject_hidden[]" value="<?= $this->input->post('total_reject') ?>">
	</td>
	<td class="nama_shift">
		<?= $this->input->post('nama_shift') ?>
		<input type="hidden" name="nama_shift_hidden[]" value="<?= $this->input->post('nama_shift') ?>">
	</td>  
	<td class="catatan">
		<?= $this->input->post('catatan') ?>
		<input type="hidden" name="catatan_hidden[]" value="<?= $this->input->post('catatan') ?>">
	</td>
	<td class="tanggal_masuk">
		<?= $this->input->post('tanggal_masuk') ?>
		<input type="hidden" name="tanggal_masuk_hidden[]" value="<?= $this->input->post('tanggal_masuk') ?>">
	</td>
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>