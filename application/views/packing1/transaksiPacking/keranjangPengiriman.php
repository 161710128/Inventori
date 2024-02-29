<tr class="row-keranjang">
	<td class="kode_alat">
		<?= $this->input->post('kode_alat') ?>
		<input type="hidden" name="kode_alat_hidden[]" value="<?= $this->input->post('kode_alat') ?>">
	</td>
	<td class="nama_alat">
		<?= $this->input->post('nama_alat') ?>
		<input type="hidden" name="nama_alat_hidden[]" value="<?= $this->input->post('nama_alat') ?>">
	</td> 
	<!-- <td class="serialnumber">
		<?= $this->input->post('serialnumber') ?>
		<input type="hidden" name="serialnumber_hidden[]" value="<?= $this->input->post('serialnumber') ?>">
	</td> -->
	<td class="total_stok">
		<?= $this->input->post('total_stok') ?>
		<input type="hidden" name="total_stok_hidden[]" value="<?= $this->input->post('total_stok') ?>">
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