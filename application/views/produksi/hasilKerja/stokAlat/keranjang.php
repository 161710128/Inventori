<tr class="row-keranjang">
	<td class="kode_alat">
		<?= $this->input->post('kode_alat') ?>
		<input type="hidden" name="kode_alat_hidden[]" value="<?= $this->input->post('kode_alat') ?>">
	</td>
	<td class="nama_alat">
		<?= $this->input->post('nama_alat') ?>
		<input type="hidden" name="nama_alat_hidden[]" value="<?= $this->input->post('nama_alat') ?>">
	</td>
	<td class="status_alat">
		<?= $this->input->post('status_alat') ?>
		<input type="hidden" name="status_alat_hidden[]" value="<?= $this->input->post('status_alat') ?>">
	</td>	
	<td class="keterangan">
		<?= $this->input->post('keterangan') ?>
		<input type="hidden" name="keterangan_hidden[]" value="<?= $this->input->post('keterangan') ?>">
	</td> 
	<td class="jumlah">
		<?= strtoupper($this->input->post('jumlah')) ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
	</td>
	<td class="nama_shift">
		<?= $this->input->post('nama_shift') ?>
		<input type="hidden" name="nama_shift_hidden[]" value="<?= $this->input->post('nama_shift') ?>">
	</td>  
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>