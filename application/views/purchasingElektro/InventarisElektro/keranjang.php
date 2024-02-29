<tr class="row-keranjang"> 
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
	<td class="peruntukan">
		<?= $this->input->post('peruntukan') ?>
		<input type="hidden" name="peruntukan_hidden[]" value="<?= $this->input->post('peruntukan') ?>">
	</td>  
	<td class="pengambil">
		<?= $this->input->post('pengambil') ?>
		<input type="hidden" name="pengambil_hidden[]" value="<?= $this->input->post('pengambil') ?>">
	</td> 
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>