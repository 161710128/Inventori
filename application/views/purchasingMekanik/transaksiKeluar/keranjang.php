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
	<!-- <td class="id_barang">
		<?= strtoupper($this->input->post('id_barang')) ?>
		<input type="hidden" name="id_barang_hidden[]" value="<?= $this->input->post('id_barang') ?>">
	</td> -->
	<td class="peruntukan">
		<?= $this->input->post('peruntukan') ?>
		<input type="hidden" name="peruntukan_hidden[]" value="<?= $this->input->post('peruntukan') ?>">
	</td> 
	<td class="pengambil">
		<?= $this->input->post('pengambil') ?>
		<input type="hidden" name="pengambil_hidden[]" value="<?= $this->input->post('pengambil') ?>">
	</td>
	<td class="shift">
		<?= $this->input->post('shift') ?>
		<input type="hidden" name="shift_hidden[]" value="<?= $this->input->post('shift') ?>">
	</td>
	<td class="tanggal">
		<?= $this->input->post('tanggal') ?>
		<input type="hidden" name="tanggal_hidden[]" value="<?= $this->input->post('tanggal') ?>">
	</td>
	<td class="jam">
		<?= $this->input->post('jam') ?>
		<input type="hidden" name="jam_hidden[]" value="<?= $this->input->post('jam') ?>">
	</td>
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>
