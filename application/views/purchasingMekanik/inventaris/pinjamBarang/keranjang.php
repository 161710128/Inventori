<tr class="row-keranjang">
	<td class="kode_part">
		<?= $this->input->post('kode_part') ?>
		<input type="hidden" name="kode_part_hidden[]" value="<?= $this->input->post('kode_part') ?>">
	</td>
	<td class="nama_barang">
		<?= $this->input->post('nama_barang') ?>
		<input type="hidden" name="nama_barang_hidden[]" value="<?= $this->input->post('nama_barang') ?>">
	</td>
	<td class="spesifikasi">
		<?= $this->input->post('spesifikasi') ?>
		<input type="hidden" name="spesifikasi_hidden[]" value="<?= $this->input->post('spesifikasi') ?>">
	</td>	
	<td class="jumlah">
		<?= $this->input->post('jumlah') ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
	</td>
	<td class="satuan">
		<?= strtoupper($this->input->post('satuan')) ?>
		<input type="hidden" name="satuan_hidden[]" value="<?= $this->input->post('satuan') ?>">
	</td>  
		<td class="alat">
		<?= strtoupper($this->input->post('alat')) ?>
		<input type="hidden" name="alat_hidden[]" value="<?= $this->input->post('alat') ?>">
	</td> 
	<td class="divisi">
		<?= strtoupper($this->input->post('divisi')) ?>
		<input type="hidden" name="divisi_hidden[]" value="<?= $this->input->post('divisi') ?>">
	</td>  
	<td class="pengambil">
		<?= $this->input->post('pengambil') ?>
		<input type="hidden" name="pengambil_hidden[]" value="<?= $this->input->post('pengambil') ?>">
	</td> 
	<td class="tanggal_masuk">
		<?= $this->input->post('tanggal_masuk') ?>
		<input type="hidden" name="tanggal_masuk_hidden[]" value="<?= $this->input->post('tanggal_masuk') ?>">
	</td>
	<td class="jam_masuk">
		<?= $this->input->post('jam_masuk') ?>
		<input type="hidden" name="jam_masuk_hidden[]" value="<?= $this->input->post('jam_masuk') ?>">
	</td>
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>