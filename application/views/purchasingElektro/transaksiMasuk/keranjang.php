<tr class="row-keranjang">
	<td class="kode_komponen">
		<?= $this->input->post('kode_komponen') ?>
		<input type="hidden" name="kode_barang_hidden[]" value="<?= $this->input->post('kode_komponen') ?>">
	</td>
	<td class="nama_komponen">
		<?= $this->input->post('nama_komponen') ?>
		<input type="hidden" name="nama_barang_hidden[]" value="<?= $this->input->post('nama_komponen') ?>">
	</td>	
	<td class="jumlah">
		<?= $this->input->post('jumlah') ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
	</td>
	<td class="satuan">
		<?= strtoupper($this->input->post('satuan')) ?>
		<input type="hidden" name="satuan_hidden[]" value="<?= $this->input->post('satuan') ?>">
	</td>
	<td class="stok_alat">
		<?= $this->input->post('stok_alat') ?>
		<input type="hidden" name="stok_alat_hidden[]" value="<?= $this->input->post('stok_alat') ?>">
	</td> 
	<td class="keterangan">
		<?= $this->input->post('keterangan') ?>
		<input type="hidden" name="keterangan_hidden[]" value="<?= $this->input->post('keterangan') ?>">
	</td>
	<td class="id_barang">
		<?= $this->input->post('id_barang') ?>
		<input type="hidden" name="id_barang_hidden[]" value="<?= $this->input->post('id_barang') ?>">
	</td> 
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr> 