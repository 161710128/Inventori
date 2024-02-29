<tr class="row-keranjang">
	<td class="kode_alat">
		<?= $this->input->post('kode_alat') ?>
		<input type="hidden" name="kode_alat_hidden[]" value="<?= $this->input->post('kode_alat') ?>">
	</td>
	<td class="nama_alat">
		<?= $this->input->post('nama_alat') ?>
		<input type="hidden" name="nama_alat_hidden[]" value="<?= $this->input->post('nama_alat') ?>">
	</td>
		<td class="jumlah">
		<?= $this->input->post('jumlah') ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
	</td>
	<td class="shift">
		<?= $this->input->post('shift') ?>
		<input type="hidden" name="shift_hidden[]" value="<?= $this->input->post('shift') ?>">
	</td>	
	<td class="keterangan">
		<?= $this->input->post('keterangan') ?>
		<input type="hidden" name="keterangan_hidden[]" value="<?= $this->input->post('keterangan') ?>">
	</td>		
	<td class="tanggal_keluar">
		<?= $this->input->post('tanggal_keluar') ?>
		<input type="hidden" name="tanggal_keluar_hidden[]" value="<?= $this->input->post('tanggal_keluar') ?>">
	</td>  
	<td class="jam_keluar">
		<?= $this->input->post('jam_keluar') ?>
		<input type="hidden" name="jam_keluar_hidden[]" value="<?= $this->input->post('jam_keluar') ?>">
	</td>
	<td class="id_tindakan" hidden>
		<?= $this->input->post('id_tindakan') ?>
		<input hidden type="hidden" name="id_tindakan_hidden[]" value="<?= $this->input->post('id_tindakan') ?>">
	</td>
	<td class="kode_transaksi" hidden>
		<?= $this->input->post('kode_transaksi') ?>
		<input hidden type="hidden" name="kode_transaksi_hidden[]" value="<?= $this->input->post('kode_transaksi') ?>">
	</td>
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
	</td>
	<td class="
	
</tr>