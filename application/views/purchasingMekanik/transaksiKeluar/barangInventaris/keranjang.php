<tr class="row-keranjang">
	<td class="nama_barang">
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
	<!-- <td class="id_barang">
		<?= strtoupper($this->input->post('id_barang')) ?>
		<input type="hidden" name="id_barang_hidden[]" value="<?= $this->input->post('id_barang') ?>">
	</td>  -->
	<td class="keterangan">
		<?= $this->input->post('keterangan') ?>
		<input type="hidden" name="keterangan_hidden[]" value="<?= $this->input->post('keterangan') ?>">
	</td>  
	<td class="pengambil">
		<?= $this->input->post('pengambil') ?>
		<input type="hidden" name="pengambil_hidden[]" value="<?= $this->input->post('pengambil') ?>">
	</td>
	<td class="tanggal_keluar">
		<?= $this->input->post('tanggal_keluar') ?>
		<input type="hidden" name="tanggal_keluar_hidden[]" value="<?= $this->input->post('tanggal_keluar') ?>">
	</td> 
	<td class="jam_keluar">
		<?= $this->input->post('jam_keluar') ?>
		<input type="hidden" name="jam_keluar_hidden[]" value="<?= $this->input->post('jam_keluar') ?>">
	</td> 
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>